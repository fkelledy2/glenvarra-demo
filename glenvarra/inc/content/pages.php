<?php
/**
 * Demo pages. Keys are used by the importer and navigation builder.
 *
 * @package Glenvarra
 */

defined( 'ABSPATH' ) || exit;

$u = 'gvb_url';

return array(

	'home' => array( 'title' => 'Home', 'slug' => 'home', 'order' => 0, 'content' => '' ),

	/* ---------------- About ---------------- */
	'about' => array(
		'title' => 'About', 'slug' => 'about', 'order' => 10, 'image' => 'campus',
		'content' =>
			gvb_lead( 'Glenvarra College has educated girls and boys at the foot of the Wicklow Mountains since 1894. Today we are an independent, multi-denominational school of 640 pupils from Junior Infants to Sixth Year, about a fifth of whom board.' )
			. gvb_h( 'Welcome from the Principal' )
			. gvb_p( 'Choosing a school is one of the most important decisions a family makes, and I am delighted you are considering Glenvarra.' )
			. gvb_p( 'We are big enough to offer real breadth — twenty-six Leaving Certificate subjects, twenty-four sports and more than forty clubs and societies — and small enough that every teacher knows every pupil by name. Our pupils leave us as confident, curious and kind young adults, ready for university, apprenticeships and whatever comes next.' )
			. gvb_p( 'The best way to understand Glenvarra is to visit. I look forward to meeting you.' )
			. gvb_quote( 'Ad lucem per laborem — towards the light, through effort.', 'The College motto' )
			. gvb_p( '<strong>Dr Aoife Brennan</strong><br>Principal' )
			. gvb_h( 'Our ethos' )
			. gvb_list(
				array(
					'<strong>Multi-denominational and inclusive</strong> — pupils of every faith and none learn side by side.',
					'<strong>Known and cared for</strong> — every pupil has a tutor who sees them daily and a year head who knows their family.',
					'<strong>Ambitious for everyone</strong> — high academic standards, with support for those who need it and stretch for those who are ready.',
					'<strong>Outward-looking</strong> — service in the local community, Erasmus+ partnerships and the Gaisce Award.',
				)
			)
			. gvb_h( 'Find out more' )
			. gvb_cards(
				array(
					array( 'Our history', 'From a small Quaker-founded schoolhouse in 1894 to the College today.', $u( '/about/history/' ) ),
					array( 'Board of Governors', 'The voluntary board that oversees the College and its trust.', $u( '/about/board-of-governors/' ) ),
					array( 'Campus &amp; facilities', 'Forty acres, two boarding houses, an all-weather pitch and a new science wing.', $u( '/about/campus/' ) ),
				)
			),
	),
	'history' => array(
		'title' => 'Our history', 'slug' => 'history', 'parent' => 'about', 'order' => 1,
		'content' =>
			gvb_lead( 'Glenvarra was founded in 1894 by a group of Wicklow families who wanted a school where their sons and daughters could be educated together, regardless of religious background — an unusual idea at the time.' )
			. gvb_table(
				array( 'Year', 'Milestone' ),
				array(
					array( '1894', 'Glenvarra School opens in the old rectory with 22 pupils.' ),
					array( '1921', 'The first boarding house, Avonmore, is built.' ),
					array( '1967', 'Glenvarra enters the free-education era as a fee-charging recognised secondary school.' ),
					array( '1988', 'The Junior School opens on the east lawn.' ),
					array( '2012', 'All-weather pitch and sports hall completed.' ),
					array( '2024', 'The Brennan Science Wing opens, with six new laboratories.' ),
				)
			)
			. gvb_p( 'The College archive welcomes enquiries from past pupils and researchers — contact <a href="mailto:archive@glenvarra.example">archive@glenvarra.example</a>.' ),
	),
	'governors' => array(
		'title' => 'Board of Governors', 'slug' => 'board-of-governors', 'parent' => 'about', 'order' => 2,
		'content' =>
			gvb_p( 'Glenvarra College is a company limited by guarantee and a registered charity. The Board of Governors sets the strategic direction of the College; the Board of Management, constituted under the Education Act 1998, oversees the day-to-day running of the secondary school.' )
			. gvb_table(
				array( 'Name', 'Role' ),
				array(
					array( 'Mr Ciarán Doyle', 'Chair of the Board of Governors' ),
					array( 'Ms Niamh O’Sullivan', 'Vice-Chair; Chair of Finance &amp; Audit' ),
					array( 'Prof. Declan Murphy', 'Governor; Chair of Education Committee' ),
					array( 'Ms Grace Okafor', 'Governor; parent nominee' ),
					array( 'Mr Rory Fitzgerald', 'Governor; past pupils’ nominee' ),
					array( 'Dr Aoife Brennan', 'Principal (ex officio)' ),
				)
			)
			. gvb_p( 'Correspondence for the Board may be sent to the Secretary to the Governors at the College address.' ),
	),
	'campus' => array(
		'title' => 'Campus & facilities', 'slug' => 'campus', 'parent' => 'about', 'order' => 3,
		'content' =>
			gvb_img( 'campus.svg', 'Illustration of the main house' )
			. gvb_lead( 'The College sits on forty acres of woodland and playing fields, forty minutes from Dublin city centre and fifteen from the M11.' )
			. gvb_list(
				array(
					'The Brennan Science Wing — six laboratories and a maker space',
					'Library and study centre, open until 9pm for boarders',
					'Sports hall, 25-metre swimming pool and fitness suite',
					'Floodlit all-weather pitch, four grass pitches and six tennis courts',
					'Music school with twelve practice rooms and a recital hall',
					'Art and design studios, including ceramics and print-making',
					'Two boarding houses and a medical centre with a resident nurse',
				)
			),
	),
	'staff' => array(
		'title' => 'Staff', 'slug' => 'staff', 'parent' => 'about', 'order' => 4,
		'content' =>
			gvb_p( 'Glenvarra has 58 teaching staff and a further 40 colleagues in boarding, administration, catering and grounds.' )
			. gvb_table(
				array( 'Senior leadership', 'Responsibility' ),
				array(
					array( 'Dr Aoife Brennan', 'Principal' ),
					array( 'Mr Seán Kavanagh', 'Deputy Principal (Pastoral); Designated Liaison Person' ),
					array( 'Ms Laura Byrne', 'Deputy Principal (Academic)' ),
					array( 'Mrs Helen Walsh', 'Head of Junior School' ),
					array( 'Mr Tom Gallagher', 'Head of Boarding' ),
					array( 'Ms Orla Keane', 'Bursar' ),
					array( 'Ms Méabh Nolan', 'Registrar &amp; Head of Admissions' ),
				)
			)
			. gvb_p( 'Interested in joining us? See <a href="' . $u( '/careers/' ) . '">current vacancies</a>.' ),
	),

	/* ---------------- Admissions ---------------- */
	'admissions' => array(
		'title' => 'Admissions', 'slug' => 'admissions', 'order' => 20,
		'content' =>
			gvb_lead( 'We welcome enquiries at any time of year. Most pupils join in Junior Infants, First Year or Transition Year, but we can often find a place at other stages.' )
			. gvb_box(
				gvb_h( 'Admissions for 2027/28', 3 )
				. gvb_p( 'Applications for September 2027 open on <strong>1 October 2026</strong> and close at <strong>4pm on 27 November 2026</strong>. Please read the <a href="' . $u( '/admissions/annual-admissions-notice/' ) . '">Annual Admissions Notice</a> and <a href="' . $u( '/admissions/admissions-policy/' ) . '">Admissions Policy</a> before applying.' )
			)
			. gvb_h( 'How to join Glenvarra' )
			. gvb_table(
				array( 'Step', 'What happens' ),
				array(
					array( '1. Visit', 'Come to an Open Morning or book a private tour with the Registrar.' ),
					array( '2. Apply', 'Complete the application form during the application window, with the €150 registration fee.' ),
					array( '3. Meet', 'Your child spends a morning with us and meets a member of the senior team.' ),
					array( '4. Offer', 'Offers are made in line with the Admissions Policy. Accept within 21 days with a €1,000 deposit, credited against first-term fees.' ),
				)
			)
			. gvb_buttons( array( 'Make an enquiry' => $u( '/admissions/expression-of-interest/' ), 'Fees &amp; financial aid' => $u( '/admissions/fees-and-financial-aid/' ) ) ),
	),
	'why' => array(
		'title' => 'Why Glenvarra?', 'slug' => 'why-glenvarra', 'parent' => 'admissions', 'order' => 1,
		'content' =>
			gvb_cards(
				array(
					array( 'Known by name', 'Average class size of 19 in the senior school and 16 in the Junior School. Every pupil has a tutor who sees them every day.', $u( '/about/' ) ),
					array( 'Strong results', 'In 2026, 41% of Leaving Certificate grades were H1 or H2, and 96% of leavers went on to higher education or apprenticeships.', $u( '/academic/leaving-certificate/' ) ),
					array( 'More than the classroom', '24 sports, a 60-piece orchestra, debating in Irish and English, and a full Transition Year programme.', $u( '/activities/' ) ),
				)
			)
			. gvb_quote( 'Our daughter was quite shy when she arrived in First Year. Six years later she was captain of debating. The teachers saw something in her before we did.', 'Parent of a 2025 leaver' ),
	),
	'fees' => array(
		'title' => 'Fees & financial aid', 'slug' => 'fees-and-financial-aid', 'parent' => 'admissions', 'order' => 2,
		'content' =>
			gvb_p( 'Fees for the 2026/27 academic year. Fees are payable termly, in advance, or in ten monthly instalments by direct debit.' )
			. gvb_table(
				array( 'Place', 'Per year' ),
				array(
					array( 'Junior School (Junior Infants – Sixth Class)', '€6,450' ),
					array( 'Secondary School — day pupil', '€8,950' ),
					array( 'Secondary School — 5-day boarding', '€17,400' ),
					array( 'Secondary School — 7-day boarding', '€19,950' ),
					array( 'International boarding (non-EU), 7-day', '€24,500' ),
				),
				'Fees include lunch, textbooks rental and most day trips. Music tuition, Transition Year trips and uniform are extra.'
			)
			. gvb_h( 'Sibling discounts' )
			. gvb_p( '10% off the fees of a second child and 15% off the third and subsequent children attending at the same time.' )
			. gvb_h( 'Bursaries' )
			. gvb_p( 'The Glenvarra Foundation funds means-tested bursaries of up to 100% of fees, so that a Glenvarra education is open to able pupils whatever their family’s circumstances. Around one in eight pupils receives some help with fees. Applications are confidential and are assessed by the Bursar.' )
			. gvb_buttons( array( 'Ask about a bursary' => $u( '/admissions/expression-of-interest/' ) ) ),
	),
	'eoi' => array(
		'title' => 'Expression of interest', 'slug' => 'expression-of-interest', 'parent' => 'admissions', 'order' => 3,
		'content' =>
			gvb_p( 'Tell us a little about your family and we’ll be in touch within two working days to arrange a tour, send a prospectus or answer your questions.' )
			. gvb_short( '[glenvarra_enquiry_form]' ),
	),
	'admissions-policy' => array(
		'title' => 'Admissions Policy', 'slug' => 'admissions-policy', 'parent' => 'admissions', 'order' => 4,
		'content' =>
			gvb_p( 'This is a summary. The full Admissions Policy, prepared in line with the Education (Admission to Schools) Act 2018, is available to download below and from the School Office.' )
			. gvb_h( 'Oversubscription criteria' )
			. gvb_p( 'Where there are more applications than places, places are offered in this order:' )
			. gvb_list(
				array(
					'Siblings of pupils currently attending, or who previously attended, the College',
					'Children of staff members',
					'Children of past pupils (no more than 25% of places, in line with the Act)',
					'All other applicants, by lottery',
				)
			)
			. gvb_p( 'Glenvarra does not take account of a pupil’s academic ability, skills or aptitude when deciding admission to the secondary school, or of any payment beyond what the Policy sets out.' )
			. gvb_h( 'Appeals' )
			. gvb_p( 'Parents may request a review of a decision by the Board of Management, and may appeal a refusal to the Department of Education under section 29 of the Education Act 1998. Details are set out in the Policy.' )
			. gvb_buttons( array( 'Download the Admissions Policy (PDF)' => '#' ) ),
	),
	'notice' => array(
		'title' => 'Annual Admissions Notice 2027/28', 'slug' => 'annual-admissions-notice', 'parent' => 'admissions', 'order' => 5,
		'content' =>
			gvb_p( 'Annual Admissions Notice in respect of admissions to the 2027/2028 school year.' )
			. gvb_table(
				array( 'Class / programme', 'Places available' ),
				array(
					array( 'Junior Infants', '24' ),
					array( 'First Year — day', '72' ),
					array( 'First Year — boarding', '24' ),
					array( 'Transition Year (external applicants)', '12' ),
				)
			)
			. gvb_table(
				array( 'Key date', '2027/28 intake' ),
				array(
					array( 'Applications open', '1 October 2026' ),
					array( 'Applications close', '4pm, 27 November 2026' ),
					array( 'Decisions issued by', '22 January 2027' ),
					array( 'Offers must be accepted by', '12 February 2027' ),
				)
			)
			. gvb_p( 'A copy of the Admissions Policy and the application form are available <a href="' . $u( '/admissions/admissions-policy/' ) . '">online</a> and from the School Office.' ),
	),

	/* ---------------- Academic ---------------- */
	'academic' => array(
		'title' => 'Academic', 'slug' => 'academic', 'order' => 30, 'image' => 'science',
		'content' =>
			gvb_lead( 'Glenvarra follows the Department of Education curriculum from First Year to Sixth Year, with small classes, a broad choice of subjects and strong pastoral support.' )
			. gvb_cards(
				array(
					array( 'Junior Cycle', 'First to Third Year: a broad foundation across 10 subjects plus short courses, wellbeing and Classroom-Based Assessments.', $u( '/academic/junior-cycle/' ) ),
					array( 'Transition Year', 'A full, compulsory TY with work experience, a mini-company, the Gaisce Award and an overseas exchange.', $u( '/academic/transition-year/' ) ),
					array( 'Leaving Certificate', 'Fifth and Sixth Year: 26 subjects, LCVP, and individual CAO guidance.', $u( '/academic/leaving-certificate/' ) ),
				)
			)
			. gvb_h( 'Subjects offered' )
			. gvb_p( 'English, Irish, Mathematics, Applied Mathematics, French, German, Spanish, Mandarin (short course), History, Geography, Classical Studies, Politics &amp; Society, Economics, Business, Accounting, Biology, Chemistry, Physics, Agricultural Science, Computer Science, Engineering, Design &amp; Communication Graphics, Art, Music, Home Economics, Physical Education.' ),
	),
	'junior-cycle' => array(
		'title' => 'Junior Cycle', 'slug' => 'junior-cycle', 'parent' => 'academic', 'order' => 1,
		'content' =>
			gvb_p( 'In First Year, pupils sample every optional subject before choosing. All pupils study English, Irish (unless exempt), Mathematics, a modern language, Science, History and Geography, and take Wellbeing, CSPE, SPHE and PE.' )
			. gvb_p( 'Classroom-Based Assessments are completed in Second and Third Year, and reported on the Junior Cycle Profile of Achievement alongside the state examinations.' ),
	),
	'ty' => array(
		'title' => 'Transition Year', 'slug' => 'transition-year', 'parent' => 'academic', 'order' => 2,
		'content' =>
			gvb_lead( 'Transition Year at Glenvarra is a full year of growing up: academic, practical and personal.' )
			. gvb_list(
				array(
					'Two weeks of work experience, in Ireland or with partner schools abroad',
					'Mini-company programme, entered in the Student Enterprise Awards',
					'Gaisce — The President’s Award, Bronze level',
					'Erasmus+ exchange with partner schools in France, Spain and Finland',
					'Musical production, debating, first aid and barista training',
					'Modules in law, coding, psychology and film',
				)
			),
	),
	'leaving-cert' => array(
		'title' => 'Leaving Certificate', 'slug' => 'leaving-certificate', 'parent' => 'academic', 'order' => 3,
		'content' =>
			gvb_p( 'Pupils take seven or eight subjects in Fifth and Sixth Year, with timetable blocks built around their choices each year. The Leaving Certificate Vocational Programme (LCVP) is also offered.' )
			. gvb_table(
				array( 'Leaving Certificate 2026', 'Glenvarra' ),
				array(
					array( 'Grades at H1 or H2', '41%' ),
					array( 'Pupils with 500+ CAO points', '38%' ),
					array( 'Leavers to higher education or apprenticeships', '96%' ),
				),
				'Figures are illustrative for this demonstration site.'
			),
	),
	'support' => array(
		'title' => 'Learning support & guidance', 'slug' => 'learning-support', 'parent' => 'academic', 'order' => 4,
		'content' =>
			gvb_p( 'Our Learning Support team works with pupils individually and in small groups, in line with the Department’s Continuum of Support. Reasonable accommodations for state examinations are arranged where eligible.' )
			. gvb_p( 'Two full-time Guidance Counsellors support subject choice, CAO and UCAS applications, apprenticeships and personal wellbeing. Pupils meet a Guidance Counsellor individually at least once a year from Third Year.' ),
	),

	/* ---------------- Junior School ---------------- */
	'junior' => array(
		'title' => 'Junior School', 'slug' => 'junior-school', 'order' => 40, 'image' => 'campus',
		'content' =>
			gvb_lead( 'The Junior School is a warm, busy place for 180 girls and boys from Junior Infants to Sixth Class, with its own building, playground and teachers.' )
			. gvb_h( 'A welcome from the Head of Junior School' )
			. gvb_p( 'Children learn best when they feel safe and happy. Our classes are small, our teachers know every child well, and our days are full of reading, making, music and fresh air. — <em>Mrs Helen Walsh</em>' )
			. gvb_list(
				array(
					'Primary curriculum, with French from Third Class',
					'Weekly swimming and specialist PE, music and art teachers',
					'Forest-school mornings in the College woods',
					'After-school club until 6pm',
					'A guaranteed place in First Year for Junior School pupils',
				)
			)
			. gvb_buttons( array( 'Arrange a visit' => $u( '/admissions/expression-of-interest/' ) ) ),
	),

	/* ---------------- Boarding ---------------- */
	'boarding' => array(
		'title' => 'Boarding', 'slug' => 'boarding', 'order' => 50, 'image' => 'boarding',
		'content' =>
			gvb_img( 'boarding.svg', 'Illustration of a boarding house at dusk' )
			. gvb_lead( 'About 140 pupils board at Glenvarra, in two houses: Avonmore for girls and Glendalough for boys. Boarding is available from First Year, on a 5-day or 7-day basis.' )
			. gvb_cards(
				array(
					array( 'Boarding life', 'Supervised study, evening activities, weekend trips and Sunday brunch.', $u( '/boarding/boarding-life/' ) ),
					array( 'International pupils', 'Pupils from 14 countries, with guardianship and English language support.', $u( '/boarding/international-students/' ) ),
					array( 'Care and health', 'Resident house parents and a school nurse on site around the clock.', $u( '/boarding/boarding-life/' ) ),
				)
			),
	),
	'boarding-life' => array(
		'title' => 'Boarding life', 'slug' => 'boarding-life', 'parent' => 'boarding', 'order' => 1,
		'content' =>
			gvb_table(
				array( 'Time', 'A typical weekday' ),
				array(
					array( '7.30am', 'Wake up and breakfast' ),
					array( '8.40am – 4.00pm', 'Lessons' ),
					array( '4.00 – 6.00pm', 'Sport, music and clubs' ),
					array( '6.00pm', 'Dinner' ),
					array( '7.00 – 9.00pm', 'Supervised study (with a break)' ),
					array( '9.00 – 10.00pm', 'House time; phones handed in' ),
					array( '10.30pm', 'Lights out (Sixth Year 11pm)' ),
				)
			)
			. gvb_p( 'At weekends, 7-day boarders enjoy trips to Dublin, the Wicklow Mountains and the coast, as well as cinema nights and cooking in the house kitchens.' ),
	),
	'international' => array(
		'title' => 'International pupils', 'slug' => 'international-students', 'parent' => 'boarding', 'order' => 2,
		'content' =>
			gvb_p( 'International pupils join Glenvarra for a term, a year or the full Leaving Certificate. We help families arrange an Irish guardian, airport transfers from Dublin Airport and English language support where needed.' )
			. gvb_p( 'Contact the Registrar at <a href="mailto:admissions@glenvarra.example">admissions@glenvarra.example</a> to discuss entry.' ),
	),

	/* ---------------- Arts & Activities ---------------- */
	'arts' => array(
		'title' => 'Arts', 'slug' => 'arts', 'order' => 60, 'image' => 'music',
		'content' =>
			gvb_cols(
				array(
					gvb_img( 'music.svg', 'Illustration of a piano and music notes' ),
					gvb_img( 'art.svg', 'Illustration of an easel and palette' ),
				)
			)
			. gvb_h( 'Music' )
			. gvb_p( 'Over 300 individual lessons are taught each week. Ensembles include the Senior Orchestra, Chamber Choir, Junior School Choir, jazz band and trad group.' )
			. gvb_h( 'Drama' )
			. gvb_p( 'A senior play, a Transition Year musical and a Junior School nativity each year, plus entries in the Wicklow Drama Festival.' )
			. gvb_h( 'Debating' )
			. gvb_p( 'Teams compete in English and Irish, including the Concern Debates and Gael Linn’s Díospóireachtaí.' )
			. gvb_h( 'Visual art' )
			. gvb_p( 'Studios for painting, ceramics and print-making, an annual exhibition, and Leaving Certificate portfolio support.' ),
	),
	'activities' => array(
		'title' => 'Sport & activities', 'slug' => 'activities', 'order' => 70, 'image' => 'sport',
		'content' =>
			gvb_img( 'sport.svg', 'Illustration of playing fields and goalposts' )
			. gvb_lead( 'Every pupil plays sport, and every pupil gets the chance to represent the College.' )
			. gvb_table(
				array( 'Season', 'Sports' ),
				array(
					array( 'Autumn', 'Rugby, hockey, Gaelic football, cross-country, camogie' ),
					array( 'Winter', 'Basketball, badminton, swimming, futsal' ),
					array( 'Summer', 'Athletics, cricket, tennis, equestrian, orienteering' ),
				)
			)
			. gvb_h( 'Clubs and societies' )
			. gvb_p( 'Chess, coding, Model UN, Young Scientist, green schools, photography, Cumann Gaelach, film club, gardening and more — over forty clubs meet each week.' )
			. gvb_h( 'Gaisce — The President’s Award' )
			. gvb_p( 'All Transition Year pupils work towards Bronze Gaisce, and many continue to Silver in Fifth Year.' ),
	),

	/* ---------------- News (posts page) ---------------- */
	'news' => array( 'title' => 'News', 'slug' => 'news', 'order' => 80, 'content' => '' ),

	/* ---------------- Contact ---------------- */
	'contact' => array(
		'title' => 'Contact & location', 'slug' => 'contact', 'order' => 90,
		'content' =>
			gvb_wide(
				gvb_cols(
					array(
						gvb_h( 'Glenvarra College', 3 )
						. gvb_p( 'Glenvarra Road, Glenvarra<br>Co. Wicklow, A98 X0X0<br>Ireland' )
						. gvb_table(
							array( 'Office', 'Contact' ),
							array(
								array( 'School Office', '<a href="tel:+35312345678">+353 1 234 5678</a><br><a href="mailto:office@glenvarra.example">office@glenvarra.example</a>' ),
								array( 'Admissions', '<a href="tel:+35312345679">+353 1 234 5679</a><br><a href="mailto:admissions@glenvarra.example">admissions@glenvarra.example</a>' ),
								array( 'Boarding', '<a href="mailto:boarding@glenvarra.example">boarding@glenvarra.example</a>' ),
								array( 'Bursar', '<a href="mailto:bursar@glenvarra.example">bursar@glenvarra.example</a>' ),
							)
						)
						. gvb_h( 'Getting here', 3 )
						. gvb_p( 'By car: about 15 minutes from the M11. By public transport: DART or bus to Bray, then the College bus (morning and afternoon, term time).' ),
						gvb_h( 'Send us a message', 3 ) . gvb_short( '[glenvarra_enquiry_form]' ),
					)
				)
			),
	),

	/* ---------------- Utility pages ---------------- */
	'parents' => array(
		'title' => 'Parents', 'slug' => 'parents', 'order' => 100,
		'content' =>
			gvb_cards(
				array(
					array( 'Calendar &amp; term dates', 'Term dates, holidays and upcoming events.', $u( '/calendar/' ) ),
					array( 'Policies', 'Code of Behaviour, Anti-Bullying, Child Safeguarding and more.', $u( '/policies/' ) ),
					array( 'Report an absence', 'Email <a href="mailto:attendance@glenvarra.example">attendance@glenvarra.example</a> before 9am.', 'mailto:attendance@glenvarra.example' ),
				)
			)
			. gvb_h( 'Useful information' )
			. gvb_list(
				array(
					'<strong>Parent portal:</strong> reports, timetables and payments (login details are issued on enrolment)',
					'<strong>Uniform:</strong> available from the College uniform shop, open Wednesdays 3–5pm in term',
					'<strong>School buses:</strong> routes from Bray, Greystones, Dún Laoghaire and Blessington',
					'<strong>Parents’ Association:</strong> meets on the first Tuesday of each month',
				)
			),
	),
	'past-pupils' => array(
		'title' => 'Past Pupils', 'slug' => 'past-pupils', 'order' => 110,
		'content' =>
			gvb_p( 'The Old Glenvarrians’ Association keeps more than 6,000 past pupils in touch with each other and with the College. Membership is free for all leavers.' )
			. gvb_list(
				array(
					'Annual reunion dinner — the last Saturday in November',
					'Careers mentoring for current Fifth and Sixth Years',
					'Past pupils’ hockey and rugby matches every December',
				)
			)
			. gvb_p( 'Update your details at <a href="mailto:alumni@glenvarra.example">alumni@glenvarra.example</a>.' ),
	),
	'calendar' => array(
		'title' => 'Calendar & term dates', 'slug' => 'calendar', 'order' => 120,
		'content' =>
			gvb_h( 'Upcoming events' )
			. gvb_short( '[glenvarra_events limit="30"]' )
			. gvb_h( 'Term dates 2026/27' )
			. gvb_table(
				array( 'Term', 'Dates' ),
				array(
					array( 'Michaelmas term', 'Thu 27 August – Fri 18 December 2026' ),
					array( 'Mid-term break', 'Mon 26 – Fri 30 October 2026' ),
					array( 'Hilary term', 'Tue 5 January – Fri 26 March 2027' ),
					array( 'Mid-term break', 'Mon 15 – Fri 19 February 2027' ),
					array( 'Trinity term', 'Mon 12 April – Fri 28 May 2027 (examination classes until the State Examinations)' ),
				),
				'Boarders return the evening before each term begins.'
			),
	),
	'policies' => array(
		'title' => 'Policies', 'slug' => 'policies', 'order' => 130,
		'content' =>
			gvb_p( 'The following policies are approved by the Board of Management and reviewed regularly. Paper copies are available from the School Office.' )
			. gvb_table(
				array( 'Policy', 'Last reviewed' ),
				array(
					array( '<a href="' . $u( '/admissions/admissions-policy/' ) . '">Admissions Policy</a>', 'September 2026' ),
					array( 'Code of Behaviour', 'August 2026' ),
					array( 'Anti-Bullying Policy (Bí Cineálta)', 'June 2026' ),
					array( 'Child Safeguarding Statement', 'September 2026' ),
					array( 'Data Protection Policy', 'May 2026' ),
					array( 'Relationships &amp; Sexuality Education', 'March 2026' ),
					array( 'ICT &amp; Acceptable Use', 'August 2026' ),
					array( 'Learning Support', 'January 2026' ),
					array( 'School Trips', 'April 2026' ),
				)
			)
			. gvb_h( 'Child Safeguarding Statement', 2, 'safeguarding' )
			. gvb_box(
				gvb_p( 'Glenvarra College is committed to the safety and wellbeing of every pupil. The College follows the Children First Act 2015, Children First: National Guidance for the Protection and Welfare of Children and the Department of Education’s Child Protection Procedures for Primary and Post-Primary Schools.' )
				. gvb_p( '<strong>Designated Liaison Person:</strong> Mr Seán Kavanagh, Deputy Principal<br><strong>Deputy DLP:</strong> Mrs Helen Walsh, Head of Junior School' )
				. gvb_p( 'The full Child Safeguarding Statement and risk assessment are available on request from the School Office.' )
			),
	),
	'careers' => array(
		'title' => 'Careers at Glenvarra', 'slug' => 'careers', 'order' => 140,
		'content' =>
			gvb_p( 'We are always pleased to hear from talented teachers and support staff who share our values.' )
			. gvb_table(
				array( 'Vacancy', 'Closing date' ),
				array(
					array( 'Teacher of Physics and Applied Mathematics (maternity cover, January 2027)', '30 October 2026' ),
					array( 'Resident Boarding House Assistant (Avonmore)', '6 November 2026' ),
					array( 'Part-time Grounds Assistant', 'Open' ),
				)
			)
			. gvb_p( 'All appointments are subject to satisfactory Garda vetting and, for teaching posts, registration with the Teaching Council. Apply to <a href="mailto:hr@glenvarra.example">hr@glenvarra.example</a>.' ),
	),
	'privacy' => array(
		'title' => 'Privacy & data protection', 'slug' => 'privacy', 'order' => 150,
		'content' =>
			gvb_p( 'Glenvarra College is the data controller for personal data collected through this website. We process that data in line with the General Data Protection Regulation (GDPR) and the Data Protection Acts 1988–2018.' )
			. gvb_h( 'What we collect', 3 )
			. gvb_p( 'When you make an enquiry or subscribe to our newsletter, we collect the details you give us (such as your name, email address and child’s intended year of entry) and keep a record of your consent. We use these details only to respond to you and, if you subscribed, to send our newsletter.' )
			. gvb_h( 'Cookies and third parties', 3 )
			. gvb_p( 'This website does not use advertising or analytics cookies and does not load fonts, maps or videos from third-party servers.' )
			. gvb_h( 'Your rights', 3 )
			. gvb_p( 'You can ask to see, correct or erase your data, or withdraw consent, at any time by contacting our Data Protection Officer at <a href="mailto:dpo@glenvarra.example">dpo@glenvarra.example</a>. You may also complain to the Data Protection Commission (<a href="https://www.dataprotection.ie">dataprotection.ie</a>).' )
			. gvb_p( 'Enquiries are kept for 24 months; newsletter subscriptions until you unsubscribe.' ),
	),
);
