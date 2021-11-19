<?php
// ┌─────────────────────────────────────────────────────────────────────────┐
// │                                                                         │
// │                                SYLLABUS                                 │
// │                                                                         │
// └─────────────────────────────────────────────────────────────────────────┘
?>
<div class="w-full grid grid-cols-1 md:grid-cols-3 mt-10 md:mt-20 gap-4">


	<a href="/syllabuss" class="flex flex-col relative w-full p-4 bg-gray-200 fill-green-500 rounded-2xl overflow-hidden hover:fill-white hover:text-white hover:bg-green-500" >

		<img class="z-30 h-60 m-auto object-cover" src="<?php echo do_shortcode('[facts fact="taxonomy_random_acf_image" tax="syllabus_category"]');?>"/>
		
		<div class="z-30 flex justify-items-stretch mt-4 ">
			<div class="border-r border-gray-300 w-full text-center"><?php echo do_shortcode('[facts fact="taxonomy_parents_count" tax="syllabus_category" ]'); ?><span class="font-light text-xs">categories</span></div>
			<div class="w-full text-center"><?php echo do_shortcode('[facts fact="posts_of_type_count" type="syllabus"]');?> <span class="font-light text-xs">videos</span></div>
		</div>
		
		
		<div class="z-30 border-t-2 border-gray-900 pt-2 mt-2 ">
			<h2 class="font-semibold text-2xl">Syllabus</h2>
			<p class="font-light">In-depth series on specific movement topics.</p>
		</div>
		
		<div class="z-20 w-full h-full absolute left-0 top-0 wavey-min bg-no-repeat bg-right-bottom mix-blend-soft-light"></div>
		
		<svg class="z-10 absolute w-11/12 h-full -top-1/4 -right-1/4 ">
			<use xlink:href="#<?php echo do_shortcode('[facts fact="taxonomy_random_acf_meta" tax="syllabus_category" meta="SVG Glyph"]');?>"></use>
		</svg>
				
		<svg class="z-0 w-full h-full absolute left-0 top-0 "><use xlink:href="#noise"></use></svg>
		
	</a>
		
	<?php
	// ┌─────────────────────────────────────────────────────────────────────────┐
	// │                                                                         │
	// │                              DEMONSTRATIONS                             │
	// │                                                                         │
	// └─────────────────────────────────────────────────────────────────────────┘
	?>
	<a href="/demonstrations" class="flex flex-col relative w-full p-4 bg-gray-200 fill-blue-500 rounded-2xl overflow-hidden hover:fill-white hover:text-white hover:bg-blue-500" >

		<img class="z-30 h-60 m-auto object-cover" src="<?php echo do_shortcode('[facts fact="taxonomy_random_acf_image" tax="demonstration_category"]'); ?>"/>
		
		<div class="z-30 flex justify-items-stretch mt-4">
			<div class="border-r border-gray-300 w-full text-center"><?php echo do_shortcode('[facts fact="taxonomy_parents_count" tax="demonstration_category" ]'); ?> <span class="font-light text-xs">categories</span></div>
			<div class="w-full text-center"><?php echo do_shortcode('[facts fact="posts_of_type_count" type="demonstration"]'); ?> <span class="font-light text-xs">videos</span></div>
		
		</div>
		
		
		<div class="z-30 border-t-2 border-gray-900 pt-2 mt-2">
			<h2 class="font-semibold text-2xl">Demonstrations</h2>
			<p class="font-light">In-depth series on specific movement topics.</p>
		</div>
		
		<div class="z-20 w-full h-full absolute left-0 top-0 wavey-min bg-no-repeat bg-right-bottom mix-blend-soft-light"></div>
		
		<svg class="z-10 absolute w-11/12 h-full  -top-1/4 -right-1/4">
			<use xlink:href="#<?php echo do_shortcode('[facts fact="taxonomy_random_acf_meta" tax="demonstration_category" meta="SVG Glyph"]'); ?>"></use>
		</svg>
		
		<svg class="w-full h-full absolute left-0 top-0 z-0"><use xlink:href="#noise"></use></svg>
		
	</a>


	<?php
	// ┌─────────────────────────────────────────────────────────────────────────┐
	// │                                                                         │
	// │                                  BLOGS                                  │
	// │                                                                         │
	// └─────────────────────────────────────────────────────────────────────────┘
	?>
	<a href="/blogs" class="flex flex-col relative w-full bg-gray-200 rounded-2xl fill-yellow-500 overflow-hidden hover:fill-white hover:text-white hover:bg-yellow-500" >

		<?php echo do_shortcode('
		[fetch post_type="blog" posts_per_page="1" orderby="rand" order="ASC"]			
			<div class="z-30 h-64 bg-no-repeat bg-center bg-cover" style="background-image:url(\'{{image::url}}\');"/></div>
		[/fetch]
		'); ?>
			
		<div class="px-4 pb-4">
			<div class="z-30 flex justify-items-stretch mt-4">
				<div class="border-r border-gray-300 w-full text-center"><?php echo do_shortcode('[facts fact="taxonomy_parents_count" tax="blog_category" ]'); ?> <span class="font-light text-xs">categories</span></div>
				<div class="w-full text-center"><?php echo do_shortcode('[facts fact="posts_of_type_count" type="blog"]'); ?> <span class="font-light text-xs">articles</span></div>
			</div>

			<svg class="h-10 w-10  absolute left-4 top-4 z-40">
				<use xlink:href="#glyph-stripes"></use>
			</svg>

			<div class="z-30 border-t-2 border-gray-900 pt-2 mt-2">
				<h2 class="font-semibold text-2xl">Blog</h2>
				<p class="font-light">Deep-dives into Parkour Topics.</p>
			</div>
		</div>
					
		<svg class="w-full h-full absolute left-0 top-0 z-0 mix-blend-lighten"><use xlink:href="#noise"></use></svg>
		
	</a>
</div>