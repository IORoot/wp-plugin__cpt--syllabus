# Articles

Used to create my CPTs for labs.LondonParkour.com. THis replaces the `andyp_articles_cpt`

Contains:

1. syllabus CPT
1. syllabus Taxonomy
1. syllabus Tags

## Shortcode [syllabus_posts]

### Simple Example:

```
[syllabus_posts] Show the {{post_title}} [/syllabus_posts]
```

### Add attributes:
```
[syllabus_posts posts_per_page='10'] Show the {{post_title}} [/syllabus_posts]
[syllabus_posts post_type='demonstration'] Show the {{post_title}} [/syllabus_posts]
```

### Different content fields:

```
[syllabus_posts posts_per_page='1']

     <h2>Post Fields</h2>
     {{post_title}} 
     {{permalink}} 

     <h2>Sanitize Fields to make them like a slug</h2>
     {{post_title:sanitize}} 

     <h2>Meta Fields</h2>
     {{meta_field}} 

     <h2>Image Fields</h2>
     {{image}} 
     {{path}} 
     {{file}} 
     {{width}} 
     {{height}} 

[/syllabus_posts]
```

### Add taxonomy / tag filters:
```
[syllabus_posts cat="cat-leaps" tag="slowmo"] Show the {{post_title}} [/syllabus_posts]
```

### Content Note:

If the post_content contains `{{moustaches}}` itself, these will also be parsed. So you can 
Add variables into your content.


