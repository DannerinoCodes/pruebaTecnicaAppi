<?php
class Validacion extends Singleton
{
    private $_rules = array();
    private $_errors = array();
    private $_oks = array();
    private $_errorFoto;
    private $_exists;
    private $_telfRepeat;
    public function addRules($rules)
    {
        $this->_rules = $rules;
    }

    public function run($toValidate)
    {
        foreach ($toValidate as $field => $value) {

            if (!array_key_exists($field, $this->_rules)) continue;
            // we previously need an array with the chain $this->_rules[$field]  using | as separator - usually mdl
            $rules = explode('|', $this->_rules[$field]);
            if (in_array('required', $rules)) {
                $this->_validate_required($field, $value);
                if (getArray($this->getErrorsByField($field), 'rule') == 'required')
                    continue;
            }
            foreach ($rules as $rule) {
                if ($rule == 'required') continue;
                $method = '_validate_' . $rule;
                // verifies if there is a validation method in this class
                if (!method_exists(__CLASS__, $method)) continue;
                // executes validation method found
                $this->$method($field, $value);
            }
            if (empty($this->getErrorsByField($field)))
                $this->_setError($field, $value, 'ok');
        }
    }

    public function isValid()
    {
        if (count($this->_oks) == count($this->_errors))
            return true;
        return false;
    }

    public function getStrRule($rule)
    {
        switch ($rule) {
            case 'alpha_space':
                return 'El texto no puede tener menos de 1 o más de 80 caracteres.';
        }
        return '';
    }

    public function restoreValue($name)
    {
        if (array_key_exists($name, $this->_errors)) {
            $value = $this->_errors[$name]['value'];
            return "$value";
        }
        return "";
    }

    public function restoreSelects($name, $value, $default = false)
    {
        if ($this->_errors) {
            if (array_key_exists($name, $this->_errors)) {
                foreach ($this->_errors[$name]['value'] as $valor) {
                    if ($valor == $value)
                        return 'selected';
                }
            }
        } elseif ($default)
            return 'selected';
    }

    public function getOks()
    {
        return $this->_oks;
    }


    public function getErrorsByField($field)
    {
        return getArray($this->_errors, $field, array());
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    private function _setError($field, $value, $rule)
    {
        $this->_errors[$field] = array(
            'value' => $value,
            'rule' => $rule
        );
        if ($rule == 'ok') {
            $this->_oks[$field] = $value;
        }
    }

    private function _validate_alpha_space($field, $value)
    {
        if (!preg_match("/^[a-zA-Z0-9ñ \(\)\n\s.,]{1,80}$/", $value))
            $this->_setError($field, $value, 'alpha_space');
        else
            $this->_setError($field, $value, 'ok');
    }

    private function _validate_required($field, $value)
    {
        if (strlen($value) == 0)
            $this->_setError($field, $value, 'required');
    }
}
