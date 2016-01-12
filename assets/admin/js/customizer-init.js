(function ( api ) {
    api.controlConstructor.select = api.Control.extend({
	ready : function () {
	    /**
	     * Add a listener to the Container Class control to activate or
	     * deactivate octopus_container_max_width.
	     */
	    if ('apollo_container_class' === this.id) {
		this.setting.bind('change', function ( value ) {
		    console.log(value);
		    if (value === 'container-fluid') {
			api.control('apollo_wrapped_element_max_width').activate();
		    } else {
			api.control('apollo_wrapped_element_max_width').deactivate();
		    }
		});
	    }
	}

    });

})(wp.customize);