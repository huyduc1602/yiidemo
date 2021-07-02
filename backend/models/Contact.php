<?php	
namespace backend\models;
use yii\db\ActiveRecord;

/**
 * 
 */
class Contact extends ActiveRecord
{

	public static function tableName()
	{
		return 'contact';
	}
	public function rules()
	{
		$rules =[
			[['name','email','subject','body'],'required'],
			[['name','email','subject'],'string','max'=>255],
			['email','string','max'=>255],
			['body','safe'],
			['email','email'],
			[['created_at','updated_at'],'integer']
		];
		return $rules;
	}
}

?>