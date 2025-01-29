<?php
$reflFunc = new \ReflectionFunction('config');

function arrayToObject($arr)
{
  return
    json_decode(json_encode($arr));
}
// print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();

function createJSONCopy($arr, $path)
{

  $json = json_encode($arr);
  $path = str_replace('.php', '.json', $path);
  return file_put_contents($path, $json);
}

if (!function_exists('find_function')) {
  /**
   * @param string $file
   * @return string
   */
  function find_function($func)
  {
    $refl = new \ReflectionFunction($func);

    return $refl->getFileName() . ':' . $refl->getStartLine();
  }
}
if(!function_exists('array_merge_recursive_preserve')) {
    function array_merge_recursive_preserve($array1, $array2)
    {
        foreach ($array1 as $key => $value) {
            if (array_key_exists($key, $array2)) {
                if (is_array($value) && is_array($array2[$key])) {
                    // dd(
                    //     $value,
                    //     $array2[$key],
                    //     array_merge_recursive_preserve($value, $array2[$key])
                    // );
                    $array2[$key] = array_merge_recursive_preserve($value, $array2[$key]);
                } else {
                    $array1[$key] = $array2[$key];
                }
            }
        }

        // return $array2;
        return array_merge($array1, $array2);
    }
}

// return
//     collect(config('content.pages'))->mapWithKeys(function ($item, $key) {
//     });
