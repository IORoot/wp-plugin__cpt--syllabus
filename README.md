
<div id="top"></div>

<div align="center">

<div style="filter: invert(96%) sepia(12%) saturate(1589%) hue-rotate(343deg) brightness(98%) contrast(105%);">
<img src="https://cdn.jsdelivr.net/npm/@mdi/svg@6.7.96/svg/post-outline.svg" style="width:200px;"/>
</div>

<h3 align="center">Custom Post Type : Syllabus Pages</h3>

<p align="center">
    Custom post type, settings and shortcode for syllabus posts on the new unreleased syllabus site. 
</p>    
</div>

##  1. <a name='TableofContents'></a>Table of Contents


* 1. [Table of Contents](#TableofContents)
* 2. [About The Project](#AboutTheProject)
	* 2.1. [Built With](#BuiltWith)
	* 2.2. [Installation](#Installation)
* 3. [Usage](#Usage)
	* 3.1. [Settings](#Settings)
	* 3.2. [Shortcode](#Shortcode)
* 4. [Customising](#Customising)
* 5. [Contributing](#Contributing)
* 6. [License](#License)
* 7. [Contact](#Contact)
* 8. [Changelog](#Changelog)


##  2. <a name='AboutTheProject'></a>About The Project

The syllabus CPT is a slight upgraded version from the others since the posts will use Markdown.

Therefore, there is an added 'settings' page for the syllabus CPT that allows you to create filters on how that Markdown is processed and rendered.

Contains:

1. syllabus CPT
1. syllabus Taxonomy
1. syllabus Tags
1. syllabus Settings
1. Syllabus Shortcode

<p align="right">(<a href="#top">back to top</a>)</p>



###  2.1. <a name='BuiltWith'></a>Built With

This project was built with the following frameworks, technologies and software.

* [ACF Pro](https://advancedcustomfields.com/)
* [Composer](https://getcomposer.org/)
* [PHP](https://php.net/)
* [Wordpress](https://wordpress.org/)

<p align="right">(<a href="#top">back to top</a>)</p>



###  2.2. <a name='Installation'></a>Installation

These are the steps to get up and running with this plugin.

1. Clone the repo into your wordpress plugin folder
    ```bash
    git clone https://github.com/IORoot/wp-plugin__cpt--syllabus ./wp-content/plugins/cpt-syllabus
    ```
1. Activate the plugin.


<p align="right">(<a href="#top">back to top</a>)</p>

##  3. <a name='Usage'></a>Usage

A new menu option `Syllabus` will appear in the admin sidebar. Here you can define new posts, category and tags.

###  3.1. <a name='Settings'></a>Settings

The settings option allow you to add new rows of type:

- Parsedown.
This allows you to switch parsedown processing on or off.

- HTML Tag Classes.
This lets you target specific HTML tags and dynamically add classes to them. Good for adding TailwindCSS classes for formating and styling.

- Structure.
This is a REGEX replace. Can be very powerful. 

###  3.2. <a name='Shortcode'></a>Shortcode

Register a shortcode that will allow you to iterate through every post and print details to the page.

Additional `:santize` function to sanitize the result.

Example usage:

```php
[syllabus_posts posts_per_page="2" order="ASC" ]
    {{post_title}}
[/syllabus_posts]
```


##  4. <a name='Customising'></a>Customising

None.

<p align="right">(<a href="#top">back to top</a>)</p>


##  5. <a name='Contributing'></a>Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue.
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



##  6. <a name='License'></a>License

Distributed under the MIT License.

MIT License

Copyright (c) 2022 Andy Pearson

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

<p align="right">(<a href="#top">back to top</a>)</p>



##  7. <a name='Contact'></a>Contact

Author Link: [https://github.com/IORoot](https://github.com/IORoot)

<p align="right">(<a href="#top">back to top</a>)</p>


##  8. <a name='Changelog'></a>Changelog

v1.0.0 - Initial.
