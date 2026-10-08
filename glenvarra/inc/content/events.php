<?php
/**
 * Demo events, dated relative to the import date.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

return array(
	'maths-week'            => array( 'title' => 'Maths Week', 'in_days' => 3, 'length' => 5, 'location' => 'Whole school', 'content' => gvb_p( 'Puzzles, challenges and the annual pi bake-off.' ) ),
	'third-year-ptm'        => array( 'title' => 'Third Year parent–teacher meeting', 'in_days' => 7, 'time' => '4.00pm – 7.00pm', 'location' => 'Sports hall', 'content' => gvb_p( 'Appointments can be booked through the parent portal.' ) ),
	'awards-evening'        => array( 'title' => 'Presentation of Awards', 'in_days' => 9, 'time' => '7.30pm', 'location' => 'Recital hall', 'content' => gvb_p( 'Celebrating last year’s achievements. Parents of award winners are warmly invited.' ) ),
	'midterm-break'         => array( 'title' => 'Mid-term break', 'in_days' => 18, 'weekday' => 'monday', 'length' => 5, 'content' => gvb_p( 'College closed. Boarding houses close at 4pm on the preceding Friday.' ) ),
	'open-morning'          => array( 'title' => 'Open Morning', 'in_days' => 32, 'weekday' => 'saturday', 'time' => '10.00am – 1.00pm', 'location' => 'Main house', 'content' => gvb_p( 'Tours led by pupils, talks from the Principal and Head of Boarding, and a chance to meet teachers. Please register through the expression of interest form.' ) ),
	'first-year-info-night' => array( 'title' => 'First Year 2027 information evening', 'in_days' => 40, 'time' => '7.00pm', 'location' => 'Recital hall', 'content' => gvb_p( 'For families of pupils applying for First Year in September 2027.' ) ),
	'christmas-concert'     => array( 'title' => 'Christmas concert', 'in_days' => 63, 'time' => '7.30pm', 'location' => 'Glenvarra Parish Church', 'content' => gvb_p( 'Choirs, orchestra and readings. All welcome.' ) ),
);
