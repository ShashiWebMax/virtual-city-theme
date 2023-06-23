/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	//add newline after each line break
	let businessDescription = attributes.businessDescription.replace(/\n/g, '<br/>');
	let businessAddress = () => null;
	if (attributes.businessAddress) {
		let bizAddress = attributes.businessAddress.replace(/\n/g, '<br/>');
		businessAddress = () => {
			return (
				<div className='flex'>
					<p className=' font-bold'>Address</p>
					<p style="margin-left:10px;" dangerouslySetInnerHTML={{ __html: bizAddress }} ></p>
				</div>
			)
		}
	}
	let businessPhone = () => null;
	if (attributes.businessPhone) {
		//split phone number by ,
		let phoneNumbers = attributes.businessPhone.split(',');
		businessPhone = () => {
			return (
				<div className='flex'>
					<p style="width:70px;" className=' font-bold'>Phone</p>
					<div>
						{phoneNumbers.map((number, index) => {
							return (
								<a  href={`tel:${number}`}>{number}</a>
							)
						})}
					</div>
				</div>
			)
		}
	}

	let businessEmail = () => null;
	if (attributes.businessEmail) {
		businessEmail = () => {
			return (
				<div className='flex'>
					<p style="width:70px;" className=' font-bold'>Email</p>
					<a href={`mailto:${attributes.businessEmail}`}>{attributes.businessEmail}</a>
				</div>
			)
		}
	}

	let businessWebsite = () => null;
	if (attributes.businessWebsite) {
		businessWebsite = () => {
			return (
				<div className='flex'>
					<p style="width:70px;" className=' font-bold'>Website</p>
					<a href={attributes.businessWebsite}>{attributes.businessWebsite}</a>
				</div>
			)
		}
	}


	return (
		<div {...useBlockProps.save()}>
			{attributes.businessName ? <h2>{attributes.businessName}</h2> : null}
			{businessDescription ? <p dangerouslySetInnerHTML={{ __html: businessDescription }}></p> : null}
			{businessAddress()}
			{businessPhone()}
			{businessEmail()}
			{businessWebsite()}
			{attributes.businessHours ? <p>Open hours : <span dangerouslySetInnerHTML={{ __html: attributes.businessHours }}></span></p> : null }

		</div>
	);
}
