import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';


export default function save(props) {

	const innerBlocksProps = useInnerBlocksProps.save( props );

	return <div {...innerBlocksProps}/>

}
