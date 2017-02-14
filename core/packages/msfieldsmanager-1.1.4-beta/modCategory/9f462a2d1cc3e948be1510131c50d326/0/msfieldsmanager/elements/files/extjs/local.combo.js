{
    xtype:'modx-combo'
    ,name: '%name%'
    ,hiddenName: '%name%'
   ,fieldLabel: _('ms2_product_%name%')
    ,store: new Ext.data.SimpleStore({
        fields: ['d','v']
        ,data:[
            ['display1','value1'],
            ['display2','value2']
        ]
    })
    ,displayField: 'd'
    ,valueField: 'v'
    ,mode: 'local'
}