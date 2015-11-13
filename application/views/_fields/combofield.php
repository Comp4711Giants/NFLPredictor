<div class="control-group">
    <label class="control-label" for="{name}">{label}</label>
    <div class="controls">
        <select id="{name}" name="{name}" value="{value}" maxLength="{maxlen}" style="width:{size}em" {disabled}>
            {options}
            <option value="{val}" {selected}>{display}</option>
            {/options}
        </select><br/>
        <em><small>{explain}</small></em>
    </div>
</div>
