// **********************************************************************
// Category Options: common, formatting, layout, widgets, embed
//

wp.blocks.registerBlockType('sro-gutenberg/block-section', {
  title: 'Block Section',
  icon: 'grid-view',
  category: 'common',
  attributes: {
    title: { type: 'string', },
    color: { type: 'string', },
    link: { type: 'string', },
  },

  edit: function(props) {
    function updateTitle(event) {
      props.setAttributes({title: event.target.value})
    }
    function updateLink(event) {
      props.setAttributes({link: event.target.value})
    }
    function updateColor(event) {
      props.setAttributes({color: event.target.value})
    }

    return wp.element.createElement(
      "div", { className: 'sro-gutenberg-block-section-backend-style' },
      wp.element.createElement("h4", { className: 'sro-gutenberg-block-section-backend-style__title'}, "Block Section"),
      wp.element.createElement("input", { type: "text", placeholder: "Title", className: 'sro-gutenberg-block-section-backend-style__input', value: props.attributes.title, onChange: updateTitle }),
      wp.element.createElement("input", { type: "text", placeholder: "Link", className: 'sro-gutenberg-block-section-backend-style__input', value: props.attributes.link, onChange: updateLink }),
      wp.element.createElement("input", { type: "text", placeholder: "Color (hexadecimal)", className: 'sro-gutenberg-block-section-backend-style__input', value: props.attributes.color, onChange: updateColor }),
    );
  },

  save: function(props) {

    return wp.element.createElement(
      "div", { style: { 'background-color': props.attributes.color } },
      wp.element.createElement("a", { href: props.attributes.link, className: 'wp-block-sro-gutenberg-block-section__link' },
        wp.element.createElement("span", { className: 'wp-block-sro-gutenberg-block-section__title' }, props.attributes.title )
      )
    );
  },
})



/*return wp.element.createElement(
  "div", { style: { background-color: props.attributes.color } },
  wp.element.createElement( "a", { className: title },
    return wp.element.createElement( "span", props.attributes.title ),
  ),
);*/
