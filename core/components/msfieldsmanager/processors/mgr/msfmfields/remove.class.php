<?php
require_once MODX_CORE_PATH . 'components/msfieldsmanager/model/msfieldsmanager/msfm.class.php';
class MsfmFieldsRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'MsfmFields';
    public $languageTopics = array('msfieldsmanager:msfmfields');
    /** @var Msfm $msfm */
    private $msfm;
    public function initialize() {
        $this->msfm = new Msfm($this->modx);
        return parent::initialize();
    }
    public function beforeRemove() {
        return parent::beforeRemove();
    }
    public function afterRemove() {
        return $this->msfm->removeField($this->object->get('name'));
    }

}
return 'MsfmFieldsRemoveProcessor';