<?php

/**
 * MODx Msfm Class
 *
 * @package msfieldsmanager
 */
class Msfm
{
    /** @var MsfmController $controller */
    public $controller;
    /** @var Array $map */
    private $map = array();
    public $manager = null;

    /**
     * Creates an instance of the Msfm class.
     *
     * @param modX &$modx A reference to the modX instance.
     * @param array $config An array of configuration parameters.
     * @return Msfm
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;
        $this->modx->lexicon->load('msfieldsmanager:default');
        $corePath = $modx->getOption('msfieldsmanager.core_path', $config, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/msfieldsmanager/');
        $assetsUrl = $modx->getOption('msfieldsmanager.assets_url', $config, $modx->getOption('assets_url') . 'components/msfieldsmanager/');
        $assetsPath = $modx->getOption('msfieldsmanager.assets_path', $config, $modx->getOption('assets_path', null, MODX_ASSETS_PATH));
        $ms2CorePath = $this->modx->getOption('minishop2.core_path', $config, $this->modx->getOption('core_path') . 'components/minishop2/');
        $ms2AssetsPath = $this->modx->getOption('minishop2.assets_path', $config, $this->modx->getOption('assets_path') . 'components/minishop2/');
        $this->config = array_merge(array(
            'chunksPath' => $corePath . 'elements/chunks/',
            'controllersPath' => $corePath . 'controllers/',
            'corePath' => $corePath,
            'assetsPath' => $assetsPath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'templatesPath' => $corePath . 'elements/templates/',
            'filesPath' => $corePath . 'elements/files/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'actionUrl' => $assetsUrl . 'action.php',
            'manager_url' => $this->modx->config['manager_url'],
            'ms2CorePath' => $ms2CorePath,
            'ms2AssetsPath' => $ms2AssetsPath,
            'ms2ModelPath' => $ms2CorePath . 'model/',
            'ms2PluginsCorePath' => $ms2CorePath . 'plugins/msfieldsmanager/',
            'ms2PluginsAssetsPath' => $ms2AssetsPath . 'plugins/msfieldsmanager/',
        ), $config);
        $this->modx->addPackage('minishop2', $this->config['ms2ModelPath']);
        $this->modx->addPackage('msfieldsmanager', $this->config['modelPath']);
        $this->createBaseFiles();
    }

    /**
     * Load the appropriate controller
     * @param string $controller
     * @return null|MsfmController
     */
    public function loadController($controller)
    {
        if ($this->modx->loadClass('MsfmController', $this->config['modelPath'] . 'msfieldsmanager/', true, true)) {
            $classPath = $this->config['controllersPath'] . 'web/' . mb_strtolower($controller) . '.php';
            $className = 'msFieldsManager' . $controller . 'Controller';
            if (file_exists($classPath)) {
                if (!class_exists($className)) {
                    $className = require_once $classPath;
                }
                if (class_exists($className)) {
                    $this->controller = new $className($this, $this->config);
                } else {
                    $this->modx->log(modX::LOG_LEVEL_ERROR, '[msFieldsManager] Could not load controller: ' . $className . ' at ' . $classPath);
                }
            } else {
                $this->modx->log(modX::LOG_LEVEL_ERROR, '[msFieldsManager] Could not load controller file: ' . $classPath);
            }
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[msFieldsManager] Could not load MsfmController class.');
        }
        return $this->controller;
    }

    /**
     * Loads the Validator class.
     *
     * @access public
     * @param string $type The name to give the service on the msfm object
     * @param array $config An array of configuration parameters for the
     * MsfmValidator class
     * @return MsfmValidator An instance of the MsfmValidator class.
     */
    public function loadValidator($type = 'validator', $config = array())
    {
        if (!$this->modx->loadClass('MsfmValidator', $this->config['modelPath'], true, true)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[Msfm] Could not load Validator class.');
            return false;
        }
        $this->$type = new MsfmValidator($this, $config);
        return $this->$type;
    }

    /**
     * Helper function to get a chunk or tpl by different methods.
     *
     * @access public
     * @param string $name The name of the tpl/chunk.
     * @param array $properties The properties to use for the tpl/chunk.
     * @param string $type The type of tpl/chunk. Can be embedded,
     * modChunk, file, or inline. Defaults to modChunk.
     * @return string The processed tpl/chunk.
     */
    public function getChunk($name, $properties, $type = 'modChunk')
    {
        $output = '';
        switch ($type) {
            case 'embedded':
                if (!$this->modx->user->isAuthenticated($this->modx->context->get('key'))) {
                    $this->modx->setPlaceholders($properties);
                }
                break;
            case 'modChunk':
                $output .= $this->modx->getChunk($name, $properties);
                break;
            case 'file':
                $name = str_replace(array(
                    '{base_path}',
                    '{assets_path}',
                    '{core_path}',
                ), array(
                    $this->modx->getOption('base_path'),
                    $this->modx->getOption('assets_path'),
                    $this->modx->getOption('core_path'),
                ), $name);
                $output .= file_get_contents($name);
                $this->modx->setPlaceholders($properties);
                break;
            case 'inline':
            default:
                /* default is inline, meaning the tpl content was provided directly in the property */
                $chunk = $this->modx->newObject('modChunk');
                $chunk->setContent($name);
                $chunk->setCacheable(false);
                $output .= $chunk->process($properties);
                break;
        }
        return $output;
    }

    private function createBaseFiles()
    {
        $fileIndex = $this->config['ms2PluginsCorePath'] . 'index.php';
        $fileMap = $this->config['ms2PluginsCorePath'] . 'msproductdata.map.inc.php';
        $fileJs = $this->config['ms2PluginsAssetsPath'] . 'msproductdata.js';

        if (!is_dir($this->config['ms2PluginsCorePath'])) {
            @mkdir($this->config['ms2PluginsCorePath']);
        }

        if (!is_dir($this->config['ms2PluginsAssetsPath'])) {
            @mkdir($this->config['ms2PluginsAssetsPath']);
        }

        if (!file_exists($fileIndex)) {
            if (!copy($this->config['filesPath'] . basename($fileIndex), $fileIndex)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'Error copy file ' . $fileIndex);
            }
        }

        if (!file_exists($fileMap)) {
            if (!copy($this->config['filesPath'] . basename($fileMap), $fileMap)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'Error copy file ' . $fileMap);
            }
        }

        if (!file_exists($fileJs)) {
            if (!copy($this->config['filesPath'] . basename($fileJs), $fileJs)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, 'Error copy file ' . $fileJs);
            }
        }
    }

    /**
     * @return xPDOManager|null An xPDOManager instance for the xPDO connection, or null
     */
    private function getManager()
    {
        if ($this->manager === null) {
            $loaded = include_once($this->config['modelPath'] . 'msfieldsmanager/' . $this->modx->config['dbtype'] . '/manager.class.php');
            if ($loaded) {
                $managerClass = 'MsfmManager_' . $this->modx->config['dbtype'];
                $this->manager = new $managerClass ($this->modx->getManager());
            }
            if (!$this->manager) {
                $this->log(xPDO::LOG_LEVEL_ERROR, "Could not load MsfmManager class.");
            }
        }
        return $this->manager;
    }

    /**
     * @return Array|mixed
     */
    private function getMap($cache = true)
    {
        $mapfile = $this->config['ms2PluginsCorePath'] . 'msproductdata.map.inc.php';
        if ((empty($this->map) || !$cache) && file_exists($mapfile)) {
            $this->map = include($mapfile);
        }
        return !empty($this->map) ? $this->map : array();
    }

    /**
     * @return array
     */
    public function getFieldMeta()
    {
        $map = $this->getMap();
        return !empty($map['fieldMeta']) ? $map['fieldMeta'] : array();
    }

    /**
     * @return array
     */
    private function getFields()
    {
        $map = $this->getMap();
        return !empty($map['fields']) ? $map['fields'] : array();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function checkFieldName($name)
    {
        $fields = $this->modx->getFields('msProductData');
        if ($fields) {
            return !array_key_exists($name, $fields);
        }
        return false;
    }

    public function addField($data)
    {
        $manager = $this->getManager();
        if ($manager->addField($data)) {
            $this->generateMap();
            $this->addExtraField($data['name']);
            $this->generatePluginJsFile();
            $this->addLexicon('ms2_product_' . $data['name'], $data['title']);
            $this->addLexicon('ms2_product_' . $data['name'] . '_help', $data['description']);
            //$this->clearCache();
            return true;
        }
        return false;
    }

    public function alterField($data)
    {
        $manager = $this->getManager();
        if ($manager->alterField($data)) {
            $this->generateMap();
            $this->generatePluginJsFile();
            $this->editLexicon('ms2_product_' . $data['name'], $data['title']);
            $this->editLexicon('ms2_product_' . $data['name'] . '_help', $data['description']);
            // $this->clearCache();
            return true;
        }
        return false;
    }

    public function removeField($name)
    {
        $manager = $this->getManager();
        if ($manager->removeField($name)) {
            $this->generateMap();
            $this->removeExtraField($name);
            $this->generatePluginJsFile();
            $this->removeLexicon('ms2_product_' . $name);
            $this->removeLexicon('ms2_product_' . $name . '_help');
            // $this->clearCache();
            return true;
        }
    }

    /**
     * @param string $xtype
     * @param string $defaultType
     * @return string
     */
    private function xtypeToPhpType($xtype, $defaultType)
    {
        switch ($xtype) {
            case 'number':
                return 'integer';
                break;
            case 'float':
                return 'float';
                break;
            case 'input':
            case 'textarea':
            case 'editor':
                return 'string';
                break;
            case 'combobox_json':
                return 'json';
                break;
            case 'combobox_custom':
                return $defaultType;
                break;
            case 'combobox_array':
                return 'array';
                break;
            case 'combobox_boolean':
            case 'checkbox':
            case 'radiobutton':
                return 'boolean';
                break;
            case 'date':
                return 'date';
                break;
            case 'time':
                return 'time';
                break;
            case 'datetime':
                return 'datetime';
                break;
            case 'timestamp':
                return 'timestamp';
                break;

        }
    }

    /**
     * @param string $type
     * @return string
     */
    public function getDefaultPrecision($type)
    {
        switch ($type) {
            case 'tinyint':
                $precision = '4';
                break;
            case 'smallint':
                $precision = '6';
                break;
            case 'mediumint':
                $precision = '9';
                break;
            case 'int':
                $precision = '11';
                break;
            case 'bigint':
                $precision = '20';
                break;
            case 'decimal':
                $precision = '10,0';
                break;
            case 'float':
                $precision = '';
                break;
            case 'double':
                $precision = '';
                break;
            default:
                $precision = '';
        }
        return $precision;
    }

    /**
     *
     */
    public function generateMap()
    {
        $manager = $this->getManager();
        $map = array('fields' => array(), 'fieldMeta' => array());
        if ($manager) {
            $q = $this->modx->newQuery('MsfmFields');
            $q->where(array('enable' => 1));
            $q->sortby('rank', 'ASC');
            if ($fields = $this->modx->getCollection('MsfmFields', $q)) {
                foreach ($fields as $field) {
                    $null = $field->dbnull ? 'true' : 'false';
                    $key = $manager->getIndex('');
                    $default = $field->dbdefault;
                    $defaultType = $this->modx->driver->getPhpType($field->dbtype);
                    $phpType = $field->xtype ? $this->xtypeToPhpType($field->xtype, $defaultType) : $defaultType;
                    if ($default === 'NULL') {
                        $default = null;
                    }
                    switch ($defaultType) {
                        case 'integer':
                        case 'boolean':
                        case 'bit':
                            $default = (integer)$default;
                            break;
                        case 'float':
                        case 'numeric':
                            $default = (float)$default;
                            break;
                        default:
                            break;
                    }
                    $map['fields'][$field->name] = $default;
                    $map['fieldMeta'][$field->name] = array();
                    $map['fieldMeta'][$field->name]['dbtype'] = $field->dbtype;
                    $map['fieldMeta'][$field->name]['precision'] = $field->dbprecision;
                    $map['fieldMeta'][$field->name]['phptype'] = $phpType;
                    $map['fieldMeta'][$field->name]['default'] = $default;
                    $map['fieldMeta'][$field->name]['null'] = (!empty($null) && strtolower($null) !== 'false') ? true : false;
                }
            }
            $manager->setMap($map);
            $manager->outputMap($this->config['ms2PluginsCorePath']);
        }
    }


    /**
     * @param string $lexicon
     */
    private function generatePluginJsFile()
    {
        $fields = 'getFields: function(config) {return {}}';
        $columns = 'getColumns: function() {return {}}';
        $q = $this->modx->newQuery('MsfmFields');
        $q->where(array('enable' => 1));
        $q->sortby('rank', 'ASC');
        if ($collection = $this->modx->getCollection('MsfmFields', $q)) {
            $fields = $this->renderPluginJs($collection, false);
            $columns = $this->renderPluginJs($collection);
        }
        $out = "miniShop2.plugin.msfieldsmanager = {" . $fields . "," . $columns . "\n};";
        $this->outputJs($this->config['ms2PluginsAssetsPath'], $out);
    }

    /**
     * @param string $path
     * @param string $content
     * @param string $className
     */
    public function outputJs($path, $content, $className = 'msProductData')
    {
        if (!is_dir($path)) {
            mkdir($path, 0777);
        }
        $fileName = $path . '/' . strtolower($className) . '.js';
        if (is_dir($path)) {
            if ($file = @fopen($fileName, 'wb')) {
                if (!fwrite($file, $content)) {
                    $this->manager->xpdo->log(xPDO::LOG_LEVEL_ERROR, "Could not write to file: {$fileName}");
                }
                fclose($file);
            } else {
                $this->manager->xpdo->log(xPDO::LOG_LEVEL_ERROR, "Could not open or create file: {$fileName}");
            }
        } else {
            $this->manager->xpdo->log(xPDO::LOG_LEVEL_ERROR, "Could not open or create dir: {$path}");
        }
    }

    /**
     * @return array
     */
    public function getDbTables()
    {
        $tables = array();
        $manager = $this->getManager();
        if ($manager) {
            $manager->setDatabase($this->modx->config['dbname']);
            $tables = $manager->getAllTables();
        }
        return $tables;
    }

    /**
     * @param string $table
     * @return array
     */
    public function getDbTableFields($table)
    {
        $fields = array();
        $manager = $this->getManager();
        if ($manager && !empty($table)) {
            $fields = $manager->geTableFields($table);
        }
        return $fields;
    }

    /**
     * @param array $data
     * @return string
     */
    public function processorGenerate($data = array())
    {
        $code = '';
        $file = $this->config['filesPath'] . 'processors/getlist.class.php';
        if (file_exists($file)) {
            $code = file_get_contents($file);
            foreach ($data as $k => $val) {
                $code = preg_replace('/%' . $k . '%/', $val, $code);
            }
        }
        return $code;
    }

    /**
     * @return bool
     */
    public function parseSchema()
    {
        $file = $this->config['filesPath'] . 'schema/schema.mysql.schema.xml';
        $manager = $this->getManager();
        if ($manager) {
            $manager->setDatabase($this->modx->config['dbname']);
            $q = $this->modx->newQuery('MsfmProcessors');
            $tables = array();
            if ($processors = $this->modx->getCollection('MsfmProcessors', $q)) {
                foreach ($processors as $processor) {
                    $tables[] = $processor->get('table_name');
                }
            }
            $manager->setAllowedTables($tables);
            if ($manager->writeTableSchema($file, 'msfieldsmanager')) {
                return $manager->parseSchema($file, $this->config['modelPath']);
            }
        }
        return false;
    }

    public function getProcessors()
    {
        $data = array();
        $q = $this->modx->newQuery('MsfmProcessors');
        if ($processors = $this->modx->getCollection('MsfmProcessors', $q)) {
            foreach ($processors as $processor) {
                $data[$processor->id] = $processor->name;
            }
        }
        return $data;
    }

    public function saveProcessor($name, $code)
    {
        $file = $this->config['processorsPath'] . 'mgr/custom/' . mb_strtolower($name) . '.class.php';
        file_put_contents($file, $code);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function removeProcessor($data)
    {
        $manager = $this->getManager();
        if ($manager) {
            $tablePrefix = $this->modx->config['table_prefix'];
            $filename = mb_strtolower($manager->getClassName($manager->getTableName($data['table_name'], $tablePrefix)));
            $files = array(
                $this->config['modelPath'] . 'msfieldsmanager/' . $filename . '.class.php',
                $this->config['modelPath'] . 'msfieldsmanager/' . $this->modx->config['dbtype'] . '/' . $filename . '.class.php',
                $this->config['modelPath'] . 'msfieldsmanager/' . $this->modx->config['dbtype'] . '/' . $filename . '.map.inc.php',
                $this->config['processorsPath'] . 'mgr/custom/' . mb_strtolower($data['name']) . '.class.php',
            );
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            return true;
        }
        return false;
    }

    /**
     * @param array $data
     * @return string
     */
    public function extjsGenerate($data)
    {
        $code = '';
        $params = array();
        $filename = 'local.combo.js';
        switch ($data['xtype']) {
            case 'combobox_custom':
                if ($data['storage'] != 'local') {
                    $filename = 'processor.combo.js';
                    if ($processor = $this->modx->getObject('MsfmProcessors', $data['storage'])) {
                        $params = $processor->toArray();
                        $params['processor_name'] = mb_strtolower($params['name']);
                        $params['connector'] = $this->config['connectorUrl'];
                    }
                }
                $params['name'] = $data['name'];
                break;
            case 'radiogroup':
                $filename = 'radiogroup.js';
                $params['name'] = $data['name'];
                break;
        }
        $file = $this->config['filesPath'] . 'extjs/' . $filename;
        if (file_exists($file)) {
            $code = file_get_contents($file);
            if (!empty($params)) {
                foreach ($params as $k => $val) {
                    $code = preg_replace('/%' . $k . '%/', $val, $code);
                }
            }
        }
        return $code;
    }


    /**
     * @param array $field
     * @param bool $forGrid
     * @return string
     */
    private function buildExjsComponent($field = array(), $forGrid = true)
    {
        $out = "{\n";
        if ($forGrid) {
            $out .= $this->ch() . "header: _('ms2_product_" . $field['name'] . "')\n";
            $out .= $this->ch() . ",dataIndex: '" . $field['name'] . "'\n";
            //$out .= $this->ch() .",sortable: true" . "\n";
            $out .= $this->ch() . ",name: '" . $field['name'] . "'\n";
            switch ($field['xtype']) {
                case 'input':
                case 'textarea':
                case 'editor_text':
                case 'editor_code':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'textfield'\n" . $this->ch() . "}\n";
                    break;
                case 'number':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'numberfield'\n" . $this->ch() . "}\n";
                    break;
                case 'float':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'numberfield'\n" . $this->ch(5) . ",decimalPrecision: 2\n" . $this->ch() . "}\n";
                    break;
                case 'combobox_boolean':
                    $out .= $this->ch() . ",width: 60" . "\n";
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'combo-boolean'\n" . $this->ch(5) . ",renderer: 'boolean'\n" . $this->ch() . "}\n";
                    break;
                case 'checkbox':
                    $out .= $this->ch() . ",width: 60" . "\n";
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'xcheckbox'\n" . $this->ch(5) . ",renderer: 'boolean'\n" . $this->ch() . "}\n";
                    break;
                case 'radiobutton':
                    $out .= $this->ch() . ",width: 60" . "\n";
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'radio'\n" . $this->ch(5) . ",renderer: 'boolean'\n" . $this->ch() . "}\n";
                    break;
                case 'timestamp':
                case 'datetime':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'datefield'\n" . $this->ch(5) . ",dateFormat: MODx.config.manager_date_format\n" . $this->ch(5) . ",timeFormat: MODx.config.manager_time_format\n" . $this->ch(5) . ",offset_time: MODx.config.server_offset_time\n" . $this->ch() . "}\n";
                    break;
                case 'date':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'datefield'\n" . $this->ch(5) . ",format: MODx.config.manager_date_format\n" . $this->ch() . "}\n";
                    break;
                case 'time':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'timefield'\n" . $this->ch(5) . ",format: MODx.config.manager_time_format\n" . $this->ch() . "}\n";
                    break;
                case 'combobox_json':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'minishop2-combo-options'\n" . $this->ch() . "}\n";
                    break;
                case 'combobox_array':
                    $out .= $this->ch() . ",editor: {\n" . $this->ch(5) . "xtype: 'minishop2-combo-options'\n" . $this->ch() . "}\n";
                    break;
            }
            $out .= $this->ch(3) . "}";
        } else {
            switch ($field['xtype']) {
                case 'input':
                    $out .= $this->ch() . "xtype: 'textfield'\n";
                    break;
                case 'textarea':
                    $out .= $this->ch() . "xtype: 'textarea'\n";
                    break;
                case 'editor_text':
                    $out .= $this->ch() . "xtype: 'textarea'\n";
                    $out .= $this->ch() . ",cls: 'modx-richtext'\n";
                    break;
                case 'editor_code':
                    $out .= $this->ch() . "xtype: Ext.ComponentMgr.types['modx-texteditor'] ? 'modx-texteditor' : 'textarea'\n";
                    $out .= $this->ch() . ",height: 250\n";
                    break;
                case 'number':
                    $out .= $this->ch() . "xtype: 'numberfield'\n";
                    break;
                case 'float':
                    $out .= $this->ch() . "xtype: 'numberfield'\n";
                    $out .= $this->ch() . ",decimalPrecision: 2\n";
                    break;
                case 'combobox_boolean':
                    $out .= $this->ch() . "xtype: 'combo-boolean'\n";
                    $out .= $this->ch() . ",hiddenName: '" . $field['name'] . "'\n";
                    //$out .= $this->ch() .",renderer: function(value) { return value == true ? 1 : 0; }\n";
                    $out .= $this->ch() . ",store: new Ext.data.SimpleStore({\n";
                    $out .= $this->ch(5) . "fields: ['d','v']\n";
                    $out .= $this->ch(5) . ",data: [[_('yes'),1],[_('no'),0]]\n";
                    $out .= $this->ch(5) . "})\n";
                    break;
                case 'checkbox':
                    $out .= $this->ch() . "xtype: 'xcheckbox'\n";
                    $out .= $this->ch() . ",hideLabel: true \n";
                    $out .= $this->ch() . ",boxLabel: _('ms2_product_" . $field['name'] . "')\n";

                    break;
                case 'radiobutton':
                    $out .= $this->ch() . "xtype: 'radio'\n";
                    $out .= $this->ch() . ",boxLabel: '" . $field['name'] . "'\n";
                    break;
                case 'timestamp':
                case 'datetime':
                    $out .= $this->ch() . "xtype: 'xdatetime'\n";
                    $out .= $this->ch() . ",dateFormat: MODx.config.manager_date_format\n";
                    $out .= $this->ch() . ",timeFormat: MODx.config.manager_time_format\n";
                    $out .= $this->ch() . ",startDay: parseInt(MODx.config.manager_week_start)\n";
                    $out .= $this->ch() . ",dateWidth: 120\n";
                    $out .= $this->ch() . ",timeWidth: 120\n";
                    $out .= $this->ch() . ",offset_time: MODx.config.server_offset_time\n";
                    break;
                case 'date':
                    $out .= $this->ch() . "xtype: 'datefield'\n";
                    break;
                case 'time':
                    $out .= $this->ch() . "xtype: 'timefield'\n";
                    $out .= $this->ch() . ",format: MODx.config.manager_time_format\n";
                    break;
                case 'combobox_json':
                    $out .= $this->ch() . "xtype: 'minishop2-combo-options'\n";
                    break;
                case 'combobox_array':
                    $out .= $this->ch() . "xtype: 'minishop2-combo-options'\n";
                    break;
                case 'combobox_custom':
                    $out .= $this->ch() . "xtype: 'minishop2-combo-options'\n";
                    break;
            }
            $out .= $this->ch() . ",fieldLabel: _('ms2_product_" . $field['name'] . "')\n";
            $out .= $this->ch() . ",description: _('ms2_product_" . $field['name'] . "_help')\n";
            $out .= $this->ch() . ",name: '" . $field['name'] . "'\n";
            $out .= $this->ch() . ",allowBlank:" . ($field['required'] ? 'false' : 'true') . "\n";
            $out .= $this->ch() . ",anchor: '100%'\n";

            $out .= $this->ch(3) . "}";

            if (!empty($field['extjs'])) {
                $out = $field['extjs'];
            }
        }
        return $out = "\n" . $this->ch(3) . $field['name'] . ": " . $out;
    }


    /**
     * @param array $fields
     * @param bool $forGrid
     * @return string
     */
    private function renderPluginJs($fields, $forGrid = true)
    {
        $out = '';
        if ($fields) {
            foreach ($fields as $field) {
                $out .= $out ? ',' : '';
                $out .= $this->buildExjsComponent($field->toArray(), $forGrid);
            }
        }
        if ($forGrid) {
            return "\n\tgetColumns: function() {\n" . $this->ch(2) . "return {" . $out . "\n" . $this->ch(2) . "}\n\t}";
        } else {
            return "\n\tgetFields: function(config) {\n" . $this->ch(2) . "return {" . $out . "\n" . $this->ch(2) . "}\n\t}";
        }
    }

    /**
     * @param string $key
     * @param string $value
     */
    private function setOption($key, $value)
    {
        $setting = $this->modx->getObject('modSystemSetting', $key);
        $setting->set('value', $value);
        $setting->save();
        $this->modx->cacheManager->refresh(array('system_settings' => array()));
    }

    private function clearCache()
    {
        $this->modx->cacheManager->refresh(array(
            'system_settings' => array(),
            'lexicon_topics' => array(),
            'scripts' => array(),
        ));
    }

    /**
     * @param string $name
     * @param string $value
     * @return boolean
     */
    private function addLexicon($name, $value)
    {
        $lexicon = $this->modx->newObject('modLexiconEntry');
        $lexicon->set('name', $name);
        $lexicon->set('namespace', 'minishop2');
        $lexicon->set('topic', 'product');
        $lexicon->set('language', $this->modx->getOption('cultureKey', null, 'en'));
        $lexicon->set('value', $value);
        $lexicon->set('editedon', date('Y-m-d h:i:s'));
        return $lexicon->save();
    }

    /**
     * @param string $name
     * @param string $value
     * @param string $topic
     * @param string $language
     * @return boolean
     */
    private function editLexicon($name, $value, $topic = 'product', $language = '')
    {
        $namespace = 'minishop2';
        $language = $language ? $language : $this->modx->getOption('cultureKey', null, 'en');
        $data = array(
            'name' => $name,
            'namespace' => $namespace,
            'language' => $language,
            'topic' => $topic,
        );
        if (!$lexicon = $this->modx->getObject('modLexiconEntry', $data)) {
            $lexicon = $this->modx->newObject('modLexiconEntry');
            $lexicon->fromArray($data);
        }

        $lexicon->set('value', $value);
        $lexicon->set('editedon', date('Y-m-d h:i:s'));

        if ($lexicon->save()) {
            $lexicon->clearCache();
            return true;
        }

        return false;
    }

    /**
     * @param string $name
     * @param string $topic
     * @param string $language
     * @return boolean
     */
    private function removeLexicon($name, $topic = 'product', $language = '')
    {
        $namespace = 'minishop2';
        $language = $language ? $language : $this->modx->getOption('cultureKey', null, 'en');
        $lexicon = $this->modx->getObject('modLexiconEntry', array(
            'name' => $name,
            'namespace' => $namespace,
            'language' => $language,
            'topic' => $topic,
        ));
        if ($lexicon->save()) {
            $lexicon->clearCache();
            return true;
        }
        return false;
    }

    private function updateExtraField()
    {
        $map = $this->getMap(false);
        if ($map['fields']) {
            $extraFields = array_map('trim', explode(',', $this->modx->getOption('ms2_product_extra_fields', null, '')));
            foreach ($map['fields'] as $k => $v) {
                $key = array_search($k, $extraFields);
                if ($key !== false) {
                    unset($extraFields[$key]);
                }
                array_push($extraFields, $k);
            }
            $this->setOption('ms2_product_extra_fields', implode(',', $extraFields));
        }
    }

    private function addExtraField($field)
    {
        $extraFields = array_map('trim', explode(',', $this->modx->getOption('ms2_product_extra_fields', null, '')));
        array_push($extraFields, $field);
        $fields = implode(',', $extraFields);
        $this->modx->setOption('ms2_product_extra_fields', $fields);
        $this->setOption('ms2_product_extra_fields', $fields);
    }

    /**
     * @param string $data
     */
    private function removeExtraField($name)
    {
        if ($name) {
            $extraFields = array_map('trim', explode(',', $this->modx->getOption('ms2_product_extra_fields', null, '')));
            $key = array_search($name, $extraFields);
            if ($key !== false) {
                unset($extraFields[$key]);
                $this->setOption('ms2_product_extra_fields', implode(',', $extraFields));
            }
        }
    }


    /**
     * @param int $count
     * @param string $symbol
     * @return string
     */
    private function ch($count = 4, $symbol = "\t")
    {
        $out = "";
        for ($i = 0; $i < $count; $i++)
            $out .= $symbol;
        return $out;
    }


    private function oldxtype2newxtype($xtype)
    {
        switch ($xtype) {
            case 'boolean':
                return 'combobox_boolean';
                break;
            case 'integer':
            case 'tinyint':
            case 'mediumint':
            case 'bigint':
            case 'int':
                return 'number';
                break;
            case 'float':
            case 'double':
            case 'decimal':
                return 'float';
                break;
            case 'string':
                return 'input';
                break;
            default:
                return $xtype;
        }
    }

    /**
     * @param string $name
     * @param array $meta
     */
    private function addOldField($name, $rank = 0, $meta = array())
    {
        $field = $this->modx->newObject('MsfmFields');
        $field->set('name', $name);
        $field->set('title', $meta['label']);
        $field->set('description', $meta['desc']);
        $field->set('dbtype', $meta['dbtype']);
        $field->set('dbprecision', $meta['precision']);
        $field->set('dbdefault', $meta['default']);
        $field->set('dbnull', ($meta['null'] ? 1 : 0));
        $field->set('xtype', $this->oldxtype2newxtype($meta['phptype']));
        $field->set('rank', $rank);
        if ($field->save()) {
            $manager = $this->getManager();
            if ($manager->alterField($field->toArray())) {
                $this->generateMap();
                $this->generatePluginJsFile();
                $this->addLexicon('ms2_product_' . $field->name, $field->title);
                $this->addLexicon('ms2_product_' . $field->name . '_help', $field->description);
            }
        }
        return false;
    }

    public function migration()
    {
        $this->modx->log(modX::LOG_LEVEL_INFO, '[msfieldsmanager] init migration');
        $backupName = '.backup_' . date('y_m_d_h_i_s');
        $fileMap = $this->config['ms2PluginsCorePath'] . 'msproductdata.map.inc.php';
        $fileJs = $this->config['ms2PluginsAssetsPath'] . 'msproductdata.js';
        $meta = $this->getFieldMeta();
        $rank = 0;
        if ($meta && !$this->modx->getCount('MsfmFields')) {
            $this->modx->log(modX::LOG_LEVEL_INFO, '[msfieldsmanager] start migration');
            if (file_exists($fileMap)) {
                copy($fileMap, $fileMap . $backupName);
            }
            if (file_exists($fileJs)) {
                copy($fileJs, $fileJs . $backupName);
            }
            foreach ($meta as $k => $v) {
                $this->addOldField($k, $rank, $v);
                $rank++;
            }
        }
    }

    public function test()
    {
        echo 'test';
    }

}