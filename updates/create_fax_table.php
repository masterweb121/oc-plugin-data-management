<?

/**
 * @author Alex Carrega <contact@alexcarrega.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @package \AxC\Faxs\Updates
 */

namespace AxC\DataManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use AxC\Framework\Helpers\Schema as SchemaHelper;

/**
 * Create the Fax DB scheme.
 */
class CreateFaxTable extends Migration
{
	/**
	 * Create the DB scheme.
	 * @return null;
	 */
	public function up()
	{
		Schema::dropIfExists('axc_data_management_fax');
		Schema::create('axc_data_management_fax', function($table)
		{
			SchemaHelper::init($table);
			$table->string('type')->unique()->index();
			$table->string('number')->unique();
			SchemaHelper::addBoolean($table, 'principal');
			SchemaHelper::addPosition($table);
			SchemaHelper::addPublished($table);
			SchemaHelper::addChangedAt($table);
			SchemaHelper::addChangedBy($table);
			SchemaHelper::avoidDelete($table);
		});
	}

	/**
	 * Delete the DB scheme.
	 * @return null;
	 */
	public function down()
	{
		Schema::drop('axc_data_management_fax');
	}
}