import React from "react";
import Slider from "react-slick";
import {InnerBlocks,InspectorControls, useBlockProps} from '@wordpress/block-editor';
import {
	PanelBody,
	PanelRow,
	TextControl
} from '@wordpress/components';
import './editor.scss';

export default function Edit(props) {

	const numberOfSliderItems = 5;
	const {attributes: {sliderId}, setAttributes} = props;

	var options = {
		dots: true,
		infinite: true,
		speed: 500,
		slidesToShow: 2,
		slidesToScroll: 1
	};

	const template = (
		<div className="marenda-slick-item">
			<img src="http://localhost/xidea/wp-content/themes/societas/assets/img/services-3.jpg" alt=""/>
		</div>
	);

	const slider = (
		<Slider {...options}>
			{template}
			{template}
			{template}
			{template}
		</Slider>
	);

	const ALLOWED_BLOCKS = ['core/columns'];

	return (
		<div {...useBlockProps()}>
			<InnerBlocks allowedBlocks={ALLOWED_BLOCKS}/>

			<InspectorControls>
				<PanelBody>
					<PanelRow>
						<TextControl
							label="Slider Id (exp: 'my-slider-1')"
							value={ sliderId }
							onChange={ ( newSliderId ) => setAttributes({sliderId: newSliderId}) }
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		</div>
	);
}
