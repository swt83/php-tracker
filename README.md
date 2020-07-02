# TrackerRMS

A PHP package for working w/ the TrackerRMS API.

THIS LIBRARY IS CURRENTLY NOT WORKING BUT IS POSTED FOR COLLABORATIVE PURPOSES.

## Install

Normal install via Composer.

## Usage

```php
use Travis\Tracker;

// submit request
$response = Travis\Tracker::run('YOURAPIKEY', 'createContact', [
	'instructions' => [
		'createcompanyifnotexists' => true,
		'overwritecontact' => false
	],
	'contact' => [
		'firstname' => 'Donald',
		'lastname' => 'Trump',
		'fullname' => 'Donald Trump',
		'jobtitle' => 'President',
		'company' => 'MAGA',
		'address1' => '',
		'address2' => '',
		'city' => '',
		'state' => '',
		'zipcode' => '',
		'country' => 'United States',
		'businessphone' => '',
		'homephone' => '',
		'cellphone' => '',
		'email' => '',
		'linkedin' => '',
		'website' => '',
		'note' => 'Make America Great Again.',
		'image' => ''
	]
]);

// response error
/*
stdClass Object
(
    [status] => 99
    [message] => Object variable or With block variable not set.
    [count] => 0
    [recordId] => 0
    [recordName] =>
)
*/
```

See the documentation PDF stored in this repo for more information.