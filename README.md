# TrackerRMS

A PHP package for working w/ the TrackerRMS API.

## Install

Normal install via Composer.

## Usage

```php
use Travis\Tracker;

// submit a resume
$response = Tracker::run('YOURUSERNAME', 'YOURPASSWORD', 'createResourceFromResume', [
	'instructions' => [
		'assigntoopportunity' => '',
		'assigntolist' => '',
		'shortlistedby' => '',
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

// get list of resumes
$response = Tracker::run('YOURUSERNAME', 'YOURPASSWORD', 'getRecords', [
	'instructions' => [
		'recordtype' => 'R',
		'state' => '',
		'searchtext' => '',
		'onlymyrecords' => false,
		'numrecords' => '100 percent', // or 100 for number count
	],
], 200); // add optional argument for number of seconds to wait for a response

// load
```

For more information see the attached documentation PDF and the online [helpdesk](https://academy.tracker-rms.com/Home/Search).