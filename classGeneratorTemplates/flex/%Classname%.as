package classestrophy
{
	[RemoteClass(alias="classestrophy.{$className}")]
	public class {$className}
	{
	{foreach $fields as $field}
	private var {$field.fieldName}:{$field.type.as};
	{/foreach}

	{foreach $fields as $field}
	public function get {$field.fieldName}() {
		return $this.{$field.fieldName};
		}

	{/foreach}

	{foreach $fields as $field}
	public function set {$field.fieldName}({$field.fieldName}:{$field.type.as}) {
		$this.{$field.fieldName} = ${$field.fieldName};
	}

	{/foreach}
}