<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
     public function index()
     {
          return view('index');
     }

     public function bikinPola(Request $request)
     {
          $maze = "";
          $bil = $request->input('bilangan');

          if ($this->adakah($bil)) {
               return response()->json([
                    'maze' => $maze,
                    'bil' => $bil
               ]);
          }

          $repeat    = $bil - 2;
          $entrycave = "<pre>@</pre>" . "<pre>&nbsp;</pre>" . str_repeat("<pre>@</pre>", $repeat);
          $road      = "<pre>@</pre>" . str_repeat("<pre>&nbsp;</pre>", $repeat) . "<pre>@</pre>";
          $wall      = str_repeat("<pre>@</pre>", $repeat) . "<pre>&nbsp;</pre>" . "<pre>@</pre>";

          $maze = "";
          $a = true;
          $b = false;
          $c = false;
          $d = 0;
          $e = 0;

          for ($j = 0; $j < $bil; $j++) {
               $maze = $maze . "<span class='maze-row'>";
               if ($a) {
                    $maze = $maze . $entrycave;
                    $a = false;
                    $b = true;
                    $d++;
               } else if ($b) {
                    $maze = $maze . $road;
                    if ($d == $e) {
                         $a = true;
                    } else {
                         $c = true;
                    }
                    $b = false;
               } else if ($c) {
                    $maze = $maze . $wall;
                    $c = false;
                    $b = true;
                    $e++;
               }
               $maze = $maze . "</span>";
          }

          return response()->json([
               'maze' => $maze,
               'bil' => $bil
          ]);
     }

     public function adakah($bil)
     {
          $n = ($bil + 1) / 4;
          if (!preg_match('/^\d+$/', $n)) {
               return true;
          }
          return false;
     }
}
