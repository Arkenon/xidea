import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';


export default function save(props) {
	const blockProps = useBlockProps.save( );
	const innerBlocksProps = useInnerBlocksProps.save( props );

	return <section class='slick-slider-block' data-slick='{"dots":true,"arrows":true,"slidesToShow": 2, "slidesToScroll": 1}' {...innerBlocksProps} />
}
