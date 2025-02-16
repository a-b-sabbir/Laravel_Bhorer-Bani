<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable()->after('password'); // Profile image

            $table->string('first_name')->after('image');
            $table->string('last_name')->after('first_name');
            $table->string('father_name')->after('last_name');
            $table->string('mother_name')->after('father_name');
            $table->string('mobile_number')->unique()->after('mother_name');
            $table->string('whatsapp_number')->nullable()->after('mobile_number');
            $table->date('dob')->after('whatsapp_number');
            $table->text('education_qualifications')->after('dob');
            $table->string('national_id')->unique()->after('education_qualifications');
            $table->string('interested_position')->after('national_id');
            $table->string('responsible_place_name')->after('interested_position');
            $table->boolean('accept_terms_conditions')->default(false)->after('responsible_place_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'image',
                'first_name',
                'last_name',
                'father_name',
                'mother_name',
                'mobile_number',
                'whatsapp_number',
                'dob',
                'education_qualifications',
                'national_id',
                'interested_position',
                'responsible_place_name',
                'accept_terms_conditions'
            ]);
        });
    }
};
