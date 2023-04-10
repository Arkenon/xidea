import {useBlockProps, useInnerBlocksProps} from '@wordpress/block-editor';
import {getBlockTypes} from '@wordpress/blocks';

import './editor.scss';

export default function Edit({context}) {

	const slidesToShow = context["gb-for-slick-slider/context"];

	const blockStyles = {
		minWidth: (100 / slidesToShow) +'%'
	}

	const blockProps = useBlockProps({style: blockStyles});

	const _blockTypes = getBlockTypes();

	const ALLOWED_BLOCKS = [''];

	_blockTypes.forEach(function (blockType) {

		if (blockType.name !== "gb-for-slick-slider/slick-slider" && blockType.name !== "gb-for-slick-slider/slick-slider-item") {
			ALLOWED_BLOCKS.push(blockType.name);
		}

	});

	const innerBlocksProps = useInnerBlocksProps(
		blockProps,
		{
			allowedBlocks: ALLOWED_BLOCKS,
		}
	);

	return (
		<div
			{...innerBlocksProps}
		/>
	);

}

