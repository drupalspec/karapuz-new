{
    xtype:'modx-combo'
    ,name: '%name%'
    ,hiddenName: '%name%'
    ,fieldLabel: _('ms2_product_%name%')
    ,displayField: '%display_field%'
    ,valueField: '%value_field%'
    ,fields: ['%display_field%','%value_field%']
    ,url: '%connector%'
    ,baseParams:{
        action: 'mgr/custom/%processor_name%'
    }
}