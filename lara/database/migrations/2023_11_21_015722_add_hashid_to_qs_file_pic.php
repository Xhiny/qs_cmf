<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHashidToQsFilePic extends Migration
{

    public function beforeCmmUp()
    {
        //
    }

    public function beforeCmmDown()
    {
        //
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qs_file_pic', function (Blueprint $table) {
            $exists_hash_id = Schema::hasColumn('qs_file_pic', 'hash_id');
            $exists_vendor_type = Schema::hasColumn('qs_file_pic', 'vendor_type');

            if(!$exists_vendor_type){
                $table->string("vendor_type", 50)->default("")
                    ->comment("提供图片存储服务的媒介，如：aliyun, qiniu, 空的话就是服务器存储")
                    ->after("cate");
            }

            if(!$exists_hash_id){
                $table->string('hash_id', 200)->default("")
                    ->comment("文件哈希值，除了空串，此值应该唯一")
                    ->after("cate");

                $table->index('hash_id','idx_hashId');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qs_file_pic', function (Blueprint $table) {
            $exists_hash_id = Schema::hasColumn('qs_file_pic', 'hash_id');
            $exists_vendor_type = Schema::hasColumn('qs_file_pic', 'vendor_type');

            if($exists_vendor_type){
                $table->dropColumn("vendor_type");
            }

            if($exists_hash_id){
                $table->dropIndex('idx_hashId');

                $table->dropColumn("hash_id");


            }
        });
    }

    public function afterCmmUp()
    {
        //
    }

    public function afterCmmDown()
    {
        //
    }
}
