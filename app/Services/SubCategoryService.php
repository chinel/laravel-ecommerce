<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 12/20/2018
 * Time: 5:20 PM
 */

namespace App\Services;
use App\Repositories\SubCategoryRepository;
use illuminate\Http\Request;
class SubCategoryService
{
    protected $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function index(){
        return $this->subCategoryRepository->all();
    }

    public function create(Request $request){
        $attributes = $request->all();

        return $this->subCategoryRepository->create($attributes);
    }

    public function edit($id){

        return $this->subCategoryRepository->find($id);
    }

    public function update(Request $request, $id){

        $attributes = $request->all();

        return $this->subCategoryRepository->update($id, $attributes);
    }

    public function delete($id){
        return $this->subCategoryRepository->delete($id);
    }

    public function getAllSubCategoryIdsNotInCategorySub($categorySubIds){

        return $this->subCategoryRepository->getAllSubCategoriesNotInCategorySub($categorySubIds);
    }


    public function getAllSubIdsNotIn($notAssignedTo){

        return $this->subCategoryRepository->getAllSubIdsNot($notAssignedTo);
    }


    public function getAllSubIdsIn($assignedToCategory){

        return $this->subCategoryRepository->getAllSubIdsIn($assignedToCategory);
    }

    public function getAllSubCategoryIds(){

        return $this->subCategoryRepository->getAllSubCategoryIds();
    }

    public function getAllSubcategoriesWithProduct(){

        return $this->subCategoryRepository->getAllSubcategoriesWithProducts();
    }

    public function findCategoryBySubCategorySlug($title){

        return $this->subCategoryRepository->findCategoryBySubCategorySlug($title);
    }

}
