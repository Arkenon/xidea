import React from "react";
import Slider from "react-slick";
import {InnerBlocks, useBlockProps} from '@wordpress/block-editor';
import './editor.scss';
import {
	Card,
	CardHeader,
	CardBody,
	CardFooter,
	__experimentalText as Text,
	__experimentalHeading as Heading,
} from '@wordpress/components';

export default function Edit(attributes, setAttributes) {

	const numberOfSliderItems = 5;

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

	const ALLOWED_BLOCKS = [ 'core/columns' ];

	return (
		<div {...useBlockProps()}>
			<Slider {...options}>
				{template}
				{template}
				{template}
				{template}
			</Slider>
			<InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
		</div>
	);
}
