miniShop2.plugin.msfieldsmanager = {
	getFields: function(config) {
		return {
			gender: {
    xtype: 'radiogroup'
    ,fieldLabel: _('ms2_product_gender')
    ,hideLabel: false
    ,columns: 1
    ,value: ''
    ,items: [{
        boxLabel: 'Мальчик'
        ,hideLabel: true
        ,name: 'gender'
        ,inputValue: 'Мальчик'
        },{
            boxLabel: 'Девочка'
            ,hideLabel: true
            ,name: 'gender'
            ,inputValue: 'Девочка'
        },{
            boxLabel: 'Общий'
            ,hideLabel: true
            ,name: 'gender'
            ,inputValue: 'Общий'
        }]
}
		}
	},
	getColumns: function() {
		return {
			gender: {
				header: _('ms2_product_gender')
				,dataIndex: 'gender'
				,name: 'gender'
			}
		}
	}
};