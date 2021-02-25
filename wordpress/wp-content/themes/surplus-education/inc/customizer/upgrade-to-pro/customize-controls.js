( function( api ) {

	// Extends our custom "surplus-education" section.
	api.sectionConstructor['surplus-education'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
