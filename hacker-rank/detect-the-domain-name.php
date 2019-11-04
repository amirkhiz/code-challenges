<?php

function getPotentialDomains( $lines ) {
    $re = '~((https|http){1}://(www|ww2|web)?(\.)?(([a-z0-9\-])+\.)+([a-z]{2,}){1})~ui';

    $domains = [];
    foreach ( $lines as $line ) {
        preg_match_all( $re, $line, $matches, PREG_SET_ORDER, 0 );

        $domains = array_merge( $domains, $matches );
    }

    return implode( ',', $domains );
}

echo getPotentialDomains( [
    'https://example.domain/page?=78',
    'http://example.domain/page?=78',
    '["Train (noun)"](https://www.askoxford.com/concise_oed/train?view=uk).',
    '["Train (noun)"](http://aefae.askoxford.com/concise_oed/train?view=uk).'
] );