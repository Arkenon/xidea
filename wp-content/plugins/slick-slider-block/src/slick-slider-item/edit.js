import {useBlockProps, useInnerBlocksProps} from '@wordpress/block-editor';

import './editor.scss';

export default function Edit(props) {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		blockProps
	);

	return (
		<div {...innerBlocksProps}/>
	);
}

