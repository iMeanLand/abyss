<?php

namespace App\Http\Controllers;

use Session;
use App\Page;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function pageShowData()
    {
        // Cind intru pe pagina sa fie data din database
        $select = DB::table('pages')->where('id', 1)->get()[0];
        return $select;
    }

    public function pageEditPage(Request $request)
    {
        if (isset($request)) {

            // Primesc datele din input

            $title = $request->page_title;
            $header_text = $request->header_text;
            $excerpt = $request->page_excerpt;
            $three_block_one = $request->three_block_one;
            $three_block_two = $request->three_block_two;
            $three_block_three = $request->three_block_three;
            $wrap_text_one = $request->wrap_text_one;
            $wrap_text_two = $request->wrap_text_two;
            $wrap_image_one = null;
            $wrap_image_two = null;
            $header_image = null;

            $query = array('title' => $title, 'header_text' => $header_text, 'excerpt' => $excerpt, 'three_block_one' => $three_block_one, 'three_block_two' => $three_block_two,
                'three_block_three' => $three_block_three, 'wrap_text_one' => $wrap_text_one, 'wrap_text_two' => $wrap_text_two);

            // Imaginea o primesc

            if (Input::hasFile('wrap_image_one')) {
                $file = Input::file('wrap_image_one');
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads', $name);
                $wrap_image_one = $name;
                $query['wrap_image_one'] = $wrap_image_one;
            }

            if (Input::hasFile('wrap_image_two')) {
                $file = Input::file('wrap_image_two');
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads', $name);
                $wrap_image_two = $name;
                $query['wrap_image_two'] = $wrap_image_two;
            }

            if (Input::hasFile('page_image')) {
                $file = Input::file('page_image');
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('uploads', $name);
                $header_image = $name;
                $query['wrap_image_three'] = $header_image;
            }

                //Fac UPDATE la date din input

            DB::table('pages')
                ->where('id', 1)
                ->update($query);

                return redirect('/admin/edit-home')->with('success', 'Page Updated');

        }
    }

}
