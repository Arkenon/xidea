import {useBlockProps, useInnerBlocksProps} from '@wordpress/block-editor';
import './style.scss';

export default function save(props) {

	const innerBlocksProps = useInnerBlocksProps.save(props);

	const attr = props.attributes;

	const options = `{"dots":${attr.dots},` +
		`"arrows":${attr.arrows},` +
		`"slidesToShow":${attr.slidesToShow},` +
		`"slidesToScroll":${attr.slidesToScroll},` +
		`"infinite":${attr.infinite},` +
		`"adaptiveHeight":${attr.adaptiveHeight},` +
		`"autoplay":${attr.autoplay},` +
		`"autoplaySpeed":${attr.autoplaySpeed},` +
		`"fade":${attr.fade},` +
		`"speed":${attr.speed},` +
		`"centerMode":${attr.infinite}}`;
	return <section class='gb-for-slick-slider'
					data-slick={options}
					{...innerBlocksProps} />
}
