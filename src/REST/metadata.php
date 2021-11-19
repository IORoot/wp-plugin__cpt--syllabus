<?php

namespace andyp\cpt\syllabus\REST;

/**
 * Return Metadata on post request to 
 * https://domain.com/wp-json/wp/v2/[customposttype]
 */
class metadata
{
    public function __construct()
    {

        /**
         * https://wordpress.stackexchange.com/questions/331832/how-to-return-meta-data-from-the-rest-api
         */
        add_action( 'rest_api_init', function () {

            /**
             * Add these two fields so that the pulse-stack plugin can grab the data
             * and use it to create the stack on londonparkour.com
             */
            register_rest_field( 'syllabus', 'channelTitle', array(
                'get_callback' => function( $post_arr ) {
                    return get_post_meta( $post_arr['id'], 'channelTitle', true );
                },
            ) );

            register_rest_field( 'syllabus', 'imageURL', array(
                'get_callback' => function( $post_arr ) {
                    return get_the_post_thumbnail_url( $post_arr['id'], 'thumbnail' );
                },
            ) );

            register_rest_field( 'syllabus', 'imageWidth', array(
                'get_callback' => function( $post_arr ) {
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post_arr['id']), 'thumbnail');
                    return $img[1];
                },
            ) );

            register_rest_field( 'syllabus', 'imageHeight', array(
                'get_callback' => function( $post_arr ) {
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($post_arr['id']), 'thumbnail');
                    return $img[2];
                },
            ) );

        } );


        /**
         * Add "RANDOM" as an orderby parameter.
         */
        add_filter( 'rest_syllabus_collection_params', function( $query_params ) {
            $query_params['orderby']['enum'][] = 'rand';
            return $query_params;
        } );
        
    }




}