<?php
/**
 * Abjad (Word to abjad convertor)
 * This function will convert words to Abjad (https://goo.gl/Lk1L4G)
 * Usage: abjad(Persian word);
 * Return: Number
 */
function abjad($word)
{
        $word = trim($word);
        $word = str_replace(array('َ','ُ','ِ','ّ','ً','ٌ','ٍ','ـ','ْ'), '', $word);
        $word = str_replace(array('گ','چ','پ','ژ','ة','آ'),array('ک','ج','ب','ز','ه','ا'),$word);
        $word = str_replace(array(')','(','+','$','!','~','#','%','^','&','*','-',' ','/','`','«','»','ء'),'',$word);
        $letter = array('ا','ب','ج','د','ه','و','ز','ح','ط','ی','ک','ل','م','ن','س','ع','ف','ص','ق','ر','ش','ت','ث','خ','ذ','ض','ظ','غ');
        $abjad =  array('+1','+2','+3','+4','+5','+6','+7','+8','+9','+10','+20','+30','+40','+50','+60','+70','+80','+90','+100','+200','+300','+400','+500','+600','+700','+800','+900','+1000');
        $string = '0'.str_replace($letter, $abjad, $word);
        $result = calculate_string($string);
        return $result;
}
function calculate_string( $mathString )    {
    $mathString = preg_replace ('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
    @$compute = create_function("", "return (" . $mathString . ");" );
    if($compute)
        return 0 + $compute();
    else
        return 0;
}
