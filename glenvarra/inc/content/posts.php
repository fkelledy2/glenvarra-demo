<?php
/**
 * Demo news posts, dated relative to the import date.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

return array(
	'maths-week-2026' => array(
		'title'    => 'Maths Week: puzzles, problems and a pi bake-off',
		'category' => 'Academic',
		'image'    => 'science',
		'days_ago' => 1,
		'excerpt'  => 'From lunchtime puzzle trails to a Sixth Year code-breaking challenge, Maths Week is taking over the College.',
		'content'  => gvb_p( 'Maths Week Ireland is back, and the Maths department has a packed programme planned across the Junior and Senior Schools.' )
			. gvb_list( array( 'Daily lunchtime puzzle trail around the main house', 'A code-breaking challenge for Fifth and Sixth Years', 'Junior School shape hunts in the woods', 'The annual pi bake-off, judged by the Principal' ) )
			. gvb_p( 'Results will be announced at assembly on Friday.' ),
	),
	'leaving-cert-results-2026' => array(
		'title'    => 'Congratulations to the Leaving Certificate class of 2026',
		'category' => 'Academic',
		'image'    => 'campus',
		'days_ago' => 6,
		'excerpt'  => 'An outstanding set of results, with 41% of grades at H1 or H2 and almost every leaver taking up a CAO or apprenticeship offer.',
		'content'  => gvb_p( 'We are very proud of the Leaving Certificate class of 2026, who achieved an outstanding set of results. 41% of all grades were H1 or H2, and 38% of pupils achieved over 500 CAO points.' )
			. gvb_p( 'More importantly, almost every one of our leavers has now taken up a place in higher education, an apprenticeship or a gap-year programme of their choosing. Congratulations to all of them, and thank you to their teachers and families.' )
			. gvb_quote( 'This year group looked after each other through every exam. Their kindness was as impressive as their grades.', 'Ms Laura Byrne, Deputy Principal' ),
	),
	'senior-cup-squad' => array(
		'title'    => 'Senior Cup squad named for the new season',
		'category' => 'Sport',
		'image'    => 'sport',
		'days_ago' => 9,
		'excerpt'  => 'A 26-strong squad has been named, with five Fifth Years included, ahead of the first round in January.',
		'content'  => gvb_p( 'Head coach Mr Gallagher has named a 26-strong Senior Cup squad for the coming season, including five Fifth Years. Pre-season friendlies begin after mid-term, with the first cup round in January.' )
			. gvb_p( 'The senior hockey and camogie teams also begin their league campaigns this month. Fixtures are on the College calendar, and all supporters are welcome.' ),
	),
	'orchestra-concert-hall' => array(
		'title'    => 'Senior Orchestra invited to perform in Dublin',
		'category' => 'Arts',
		'image'    => 'music',
		'days_ago' => 14,
		'excerpt'  => 'Our 60-piece Senior Orchestra will play at a national schools’ showcase in December.',
		'content'  => gvb_p( 'The Senior Orchestra has been selected to perform at a national schools’ showcase in Dublin this December, one of only eight schools invited.' )
			. gvb_p( 'The programme includes music by Bizet, Ina Boyle and a new piece by Sixth Year composer Ella Moran. Rehearsals have begun in earnest.' ),
	),
	'ty-science-water' => array(
		'title'    => 'TY team’s river project heads to national science exhibition',
		'category' => 'Academic',
		'image'    => 'science',
		'days_ago' => 21,
		'excerpt'  => 'Three Transition Year pupils spent the summer testing water quality on the Vartry — and found something surprising.',
		'content'  => gvb_p( 'Three Transition Year pupils, Saoirse, Adam and Mei, spent the summer sampling water quality at twelve points along the Vartry river. Their project, which maps nitrate levels against land use, has been accepted for the national science exhibition in January.' )
			. gvb_p( 'The team were mentored by Dr Clarke in the new science wing, and have presented their findings to the local county council.' ),
	),
	'boarding-common-room' => array(
		'title'    => 'New Sixth Year common room opens in Glendalough House',
		'category' => 'Boarding',
		'image'    => 'boarding',
		'days_ago' => 30,
		'excerpt'  => 'A quiet study space, a kitchen and a lot of beanbags — designed by the boarders themselves.',
		'content'  => gvb_p( 'Sixth Year boarders in Glendalough House have a new common room, designed with input from the boarders themselves. It includes a quiet study area, a kitchen and plenty of space to relax at the end of the day.' )
			. gvb_p( 'A matching room in Avonmore House will open after Christmas.' ),
	),
	'junior-school-harvest' => array(
		'title'    => 'Junior School harvest festival raises €3,800',
		'category' => 'Junior School',
		'image'    => 'art',
		'days_ago' => 38,
		'excerpt'  => 'Songs, a bake sale and a very competitive vegetable-growing contest raised funds for a local food bank.',
		'content'  => gvb_p( 'Thank you to every family who came to the Junior School harvest festival. Between the bake sale, the art auction and a very competitive giant-vegetable contest, the children raised €3,800 for a local food bank.' ),
	),
);
