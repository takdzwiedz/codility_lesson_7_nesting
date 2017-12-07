<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 05.12.2017
 * Time: 11:11
 */

/**
 * NESTING
 * A string S consisting of N characters is called properly nested if:
 *  S is empty;
 *  S has the form "(U)" where U is a properly nested string;
 *  S has the form "(U)" where U is a properly nested string;
 *  S has the form "VW"
 * where V and W are properly nested strings.
 * For example, string "(()(())())" is properly nested but string "())" isn’t.
 * Write a function
 * function nesting($S);
 * that, given a string S consisting of N characters, returns 1 if string S is properly nested and 0 otherwise.
 * Assume that:
 *  N is an integer within the range [0..1,000,000];
 *  string S consists only of the characters ( and/or ).
 * For example, given S = "(()(())())", the function should return 1 and given S = "())", the function should return 0, as explained above.
 * Complexity:
 *  expected worst-case time complexity is O(N);
 * expected worst-case space complexity is O(1) (not counting the storage required for input arguments).
 *
*/

$S1 = '';
$S2 = "(U)";
$S3 = '(()(())())6';
$S4 = '(())(';
$S5 = ')4';
$S6 = '(())';
$S7 = ')(()))';

function nesting($S) {

    $sLength = strlen($S);

    // Empty string is OK

    if ($sLength==0) {

        echo '1 - correct - string empty';

    } elseif ($sLength > 0 && $sLength < 1000000) {

        // Only bracket-type string accepted

        if(!preg_match('/[?!@#$%^&_+=\-.,;:\'"{}`~<>|\/\\\[\]*A-Za-z\d\s]/', $S)) {

            // Even strings can go ahead

            if($sLength%2== 0){

                // Pair of brackets remover

                for ($i = strlen($S)/2; $i>0; $i--){

                    $result = str_replace("()",'',$S);
                    $S = $result;
                }

                if (strlen($result) == 0){

                    // If nothing left, it's OK

                    echo '1 - Hoorray! This is proper S - string! ';

                } else {

                    // If something left it means some of two types of brackets are doubled - not OK

                    echo '0 - brackets are asimetric';
                }

            } else {

                // When no of characters is odd - it is not proper string for sure

                echo '0 - number of characters is odd';
            }

        } else {

            // Other characters than bracket in string - not OK

            echo '0 - invalid charachters';
        }
    } else {

        // If (barely possible) more than 1 000 000 characters - not OK

        echo '0 - too many characters';
    }
}

echo 'S1 = '; nesting($S1);echo '<br>';
echo 'S2 = '; nesting($S2);echo '<br>';
echo 'S3 = '; nesting($S3); echo '<br>';
echo 'S4 = '; nesting($S4); echo '<br>';
echo 'S5 = '; nesting($S5); echo '<br>';
echo 'S6 = '; nesting($S6); echo '<br>';
echo 'S7 = '; nesting($S7);


