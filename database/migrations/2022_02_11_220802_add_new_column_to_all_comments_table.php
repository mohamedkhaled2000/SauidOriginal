<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToAllCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_comments', function (Blueprint $table) {
            if (!Schema::hasColumn('all_comments', 'post_id')){
                $table->unsignedBigInteger('post_id')->after('comment');
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');              };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_comments', function (Blueprint $table) {
            $table->dropColumn(['post_id']);
        });
    }
}
