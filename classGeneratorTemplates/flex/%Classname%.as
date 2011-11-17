package classestrophy
{
    [RemoteClass(alias="classestrophy.{$className}")]
    public class {$className}
    {
{foreach $fields as $field}
	    private var _{$field.fieldName}:{$field.type.as};
{/foreach}

	    // Getters
{foreach $fields as $field}
	    public function get {$field.fieldName}():{$field.type.as} {
		    return this._{$field.fieldName};
	    }
{/foreach}

	    // Setters
{foreach $fields as $field}
	    public function set {$field.fieldName}({$field.fieldName}:{$field.type.as}):void {
		    this._{$field.fieldName} = {$field.fieldName};
	    }
{/foreach}
    }
}