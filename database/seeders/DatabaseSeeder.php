<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Diploma;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(['email'=>'admin@academy.test'],[
            'name'=>'Academy Administrator','password'=>'ChangeMe!2026'
        ]);
        $categories = [
            'Information Technology'=>'information-technology',
            'Health & Safety'=>'health-safety',
            'Quality Control'=>'quality-control',
            'Technical Training'=>'technical-training',
        ];
        foreach ($categories as $name=>$slug) Category::firstOrCreate(['slug'=>$slug],['name'=>$name]);
        $samples = [
            ['Information Technology','Diploma in Information Technology (DIT)','12 Months',35000,'Local Board','Local Technical Education Board','Comprehensive IT training covering office productivity, networking, databases and practical computing.'],
            ['Health & Safety','IOSH Managing Safely','3–5 Days',28000,'International Institution','IOSH','Practical health and safety management training for supervisors and managers.'],
            ['Health & Safety','NEBOSH International General Certificate','3–6 Months',185000,'International Institution','NEBOSH','International occupational health and safety qualification. Confirm current awarding and examination arrangements before publishing.'],
            ['Quality Control','Quality Control (QC) Technician','3 Months',45000,'Academy Certificate','Academy','Foundations of inspection, documentation, quality tools and process control.'],
        ];
        foreach ($samples as [$cat,$title,$duration,$fee,$approval,$body,$desc]) {
            $category=Category::where('name',$cat)->first();
            Diploma::firstOrCreate(['title'=>$title],[
                'category_id'=>$category->id,'short_description'=>$desc,'description'=>$desc,
                'duration'=>$duration,'fee'=>$fee,'registration_fee'=>0,'currency'=>'PKR',
                'approval_type'=>$approval,'awarding_body'=>$body,'certificate_type'=>'As specified by awarding body',
                'is_published'=>true,'featured'=>true
            ]);
        }
    }
}
