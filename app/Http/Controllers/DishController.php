<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mealValues = $groupedDishes = $foodNames = [];
        $dishes = config('data.dishes');
        foreach ($dishes as $dish) {
            foreach ($dish['availableMeals'] as $meal) {
                if (!in_array($meal, $mealValues)) {
                    $mealValues[] = $meal;
                }
            }
        }

        // foreach ($mealValues as $meal) {
        //     $groupedDishes[$meal] = [];
        //     foreach ($dishes as $dish) {
        //         if (in_array($meal, $dish['availableMeals'])) {
        //             $groupedDishes[$meal][] = $dish;
        //         }
        //     }
        // }

        foreach ($mealValues as $meal) {
            $groupedDishes[$meal] = [];
        
            foreach ($dishes as $dish) {
                if (in_array($meal, $dish['availableMeals'])) {
                    $groupedDishes[$meal][$dish['restaurant']][] = $dish['name'];
                }
            }
        }
    // dd($groupedDishes['lunch']['Mc Donalds']);

//         foreach ($groupedDishes as $key => $dish) {
// dd($key);
//         }
        // dd($dishes);
        // dd($groupedDishes);
        // dd($foodNames);
        return view('welcome', compact('mealValues', 'groupedDishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
