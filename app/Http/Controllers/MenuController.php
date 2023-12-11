<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public $pageSize = 6;

    public function index()
    {
        $menu = Menu::paginate($this->pageSize);
        return view('public/home', ['menu' => $menu]);
    }

    public function detail($id) {
        $success = session()->get('success') ?? null;
        $menu = Menu::where('food_id', $id)->first();

        if($menu==null) {
            return redirect()->route('home');
        }

        return view('public/menu', [
            'menu' => $menu,
            'success' => $success
        ]);
    }

    public function mainCourse() {
        $menu = Menu::where('food_type', 'Main Course')->paginate($this->pageSize);
        
        if($menu==null) {
            return redirect()->route('home');
        }

        return view('public/home', ['menu' => $menu]);
    }

    public function beverages() {
        $menu = Menu::where('food_type', 'Beverages')->paginate($this->pageSize);

        if($menu==null) {
            return redirect()->route('home');
        }

        return view('public/home', ['menu' => $menu]);
    }

    public function desserts() {
        $menu = Menu::where('food_type', 'Desserts')->paginate($this->pageSize);

        if($menu==null) {
            return redirect()->route('home');
        }

        return view('public/home', ['menu' => $menu]);
    }

    public function result(Request $request) {
        $name = $request->get('searching');
        $type1 = $request->get('type_main_course');
        $type2 = $request->get('type_beverages');
        $type3 = $request->get('type_desserts');

        if($name!=null) {
            if($type1==null) {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type2)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                }
            } else {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type1)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type1)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type1)->orWhere('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::paginate($this->pageSize);
                    }
                }
            }
        } else {
            if($type1==null) {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_type', $type2)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                }
            } else {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::where('food_type', $type1)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_type', $type1)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_type', $type1)->orWhere('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::paginate($this->pageSize);
                    }
                }
            }
        }

        if(count($search)==0) {
            $search=null;
        }

        return view('auth/search', ['result' => $search]);
    }

    public function resultM(Request $request) {
        $name = $request->get('searching');
        $type1 = $request->get('type_main_course');
        $type2 = $request->get('type_beverages');
        $type3 = $request->get('type_desserts');

        if($name!=null) {
            if($type1==null) {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type2)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                }
            } else {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type1)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type1)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_name', 'like','%'.$name.'%')->where('food_type', $type1)->orWhere('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::paginate($this->pageSize);
                    }
                }
            }
        } else {
            if($type1==null) {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_type', $type2)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                }
            } else {
                if($type2==null) {
                    if($type3==null) {
                        $search = Menu::where('food_type', $type1)->paginate($this->pageSize);
                    } else {
                        $search = Menu::where('food_type', $type1)->orWhere('food_type', $type3)->paginate($this->pageSize);
                    }
                } else {
                    if($type3==null) {
                        $search = Menu::where('food_type', $type1)->orWhere('food_type', $type2)->paginate($this->pageSize);
                    } else {
                        $search = Menu::paginate($this->pageSize);
                    }
                }
            }
        }

        if(count($search)==0) {
            $search=null;
        }

        return view('auth/manage', ['result' => $search]);
    }

    public function search() {
        $result = Menu::paginate($this->pageSize);
        return view('auth/search', ['result' => $result]);
    }

    public function searchM() {
        $result = Menu::paginate($this->pageSize);
        return view('auth/manage', ['result' => $result]);
    }

    public function addMenu(Request $request) {
        // $this->authorize('create', Auth::user());

        $validateData = $request->validate([
            'food_name' => 'bail|required|string|min:5',
            'food_type' => 'bail|required|string',
            'food_price' => 'bail|required|integer|min:1',
            'brief_desc' => 'bail|required|string|max:100',
            'about_food' => 'bail|required|string|max:255',
            'food_img' => 'bail|required|image|mimes:jpeg,png,jpg|max:20480'
        ]);

        $real_img_name = $request->file('food_img')->getClientOriginalName();
        $real_img_ext = $request->file('food_img')->getClientOriginalExtension();
        $img_info = pathinfo($real_img_name);
        $filename = $img_info['filename'];
        $new_img_name = $filename.".".$real_img_ext;
        $path = 'storage/images';
        $request->file('food_img')->move($path, $new_img_name);

        $requestData = [
            'food_id' => Str::uuid()->toString(),
            'food_name' => $request->get('food_name'),
            'food_type' => $request->get('food_type'),
            'food_price' => $request->get('food_price'),
            'brief_desc' => $request->get('brief_desc'),
            'about_food' => $request->get('about_food'),
            'food_img' => $new_img_name
        ];

        Menu::create($requestData);

        return redirect()->route('home');
    }

    public function returnAddMenu() {
        return view('auth/add');
    }

    public function returnManageMenu() {
        $result = Menu::paginate($this->pageSize);
        return view('auth/manage', ['result' => $result]);
    }

    public function updatePage(Request $request) {
        $food_id = $request->get('food_id');
        return view('auth/update', compact('food_id'));
    }

    public function updateMenu(Request $request) {
        // $this->authorize('update', Auth::user(), Menu::class);

        $validateData = $request->validate([
            'food_name' => 'bail|nullable|string|min:5',
            'food_type' => 'bail|nullable|string',
            'food_price' => 'bail|nullable|integer|min:1',
            'brief_desc' => 'bail|nullable|string|max:100',
            'about_food' => 'bail|nullable|string|max:255',
            'food_img' => 'bail|nullable|image|mimes:jpeg,png,jpg|max:20480'
        ]);

        $menu = Menu::where('food_id',$request->get('food_id'))->first();

        $menu['food_name'] = $request->get('food_name') ?? $menu->food_name;
        $menu['food_type'] = $request->get('food_type') ?? $menu->food_type;
        $menu['food_price'] = $request->get('food_price') ?? $menu->food_price;
        $menu['brief_desc'] = $request->get('brief_desc') ?? $menu->brief_desc;
        $menu['about_food'] = $request->get('about_food') ?? $menu->about_food;
        $menu['food_name'] = $request->get('food_name') ?? $menu->food_name;

        if($request->file('food_img')!=null) {
            $real_img_name = $request->file('food_img')->getClientOriginalName();
            $real_img_ext = $request->file('food_img')->getClientOriginalExtension();
            $img_info = pathinfo($real_img_name);
            $filename = $img_info['filename'];
            $new_img_name = $filename.".".$real_img_ext;
            $path = 'storage/images';
            $request->file('food_img')->move($path, $new_img_name);
            $menu['food_img'] = $new_img_name ?? $menu->file('food_img');
        }

        $menu->save();

        $result = Menu::all();
        return redirect()->route('returnManageMenu')->with(['result' => $result]);
    }

    public function deleteMenu(Request $request) {
        // $this->authorize('delete', Auth::user(), Menu::class);

        $id = $request->get('food_id');
        Menu::where('food_id', $id)->delete();
        $result = Menu::all();

        return redirect()->route('returnManageMenu')->with(['result' => $result]);
    }
}
