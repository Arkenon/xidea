import {useBlockProps, useInnerBlocksProps} from '@wordpress/block-editor';


export default function save(props) {

	const innerBlocksProps = useInnerBlocksProps.save(props);

	const attr = props.attributes;

	const blockStyles = {
		marginRight: attr.slideMargin + 'px',
		marginLeft: attr.slideMargin + 'px',
	}

	return <div style={blockStyles}  {...innerBlocksProps}/>

}
