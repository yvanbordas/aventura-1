/**
 * WholeAuth SDK - CSS module
 * <p>
 * Copyrigth 2015 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('css', '0.1.1');
    // Return requested style obejct
    $this.get = function(name, remove) {
        // Convert test string to lower case.
        name = name.toLowerCase();
        // If browser can play with stylesheets
        if (document.styleSheets != undefined)
            // For each stylesheet
            for (var i = 0; i < document.styleSheets.length; i++) {
                // Get the current Stylesheet
                var styleSheet = document.styleSheets[i];
                // Initialize subCounter.
                var ii = 0;
                // Initialize cssRule.
                var cssRule = false;
                // For each rule in stylesheet
                do {
                    // Browser uses cssRules?
                    if (styleSheet.cssRules != undefined)
                        // Yes --Mozilla Style
                        cssRule = styleSheet.cssRules[ii];
                    // Browser usses rules?
                    else
                        // Yes IE style.
                        cssRule = styleSheet.rules[ii];
                    // If we found a rule...
                    if (cssRule != false)
                        // match ruleName?
                        if (cssRule.selectorText.toLowerCase() == name)
                            // Yes. Are we deleteing?
                            if (remove) {
                                if (styleSheet.cssRules)
                                    // Delete rule, Moz Style
                                    styleSheet.deleteRule(ii);
                                else
                                    // Delete rule IE style.
                                    styleSheet.removeRule(ii);
                                // return true, class deleted.
                                return true;
                            } else
                                // found and not deleting.
                                // return the style object.
                                return cssRule;
                    // Increment sub-counter
                    ii++;
                } while (cssRule);
            }
        // we found NOTHING!
        return false;
    }
    // Delete a CSS rule
    $this.remove = function(name) {
        // just call getCSSRule w/delete flag.
        return $this.get(name, true);
    }
    // Create a new css rule
    $this.add = function(name) {
        // Can browser do styleSheets?
        if (document.styleSheets != undefined)
            // if rule doesn't exist...
            if (!$this.get(name))
                // Browser is IE?
                if (document.styleSheets[0].addRule != undefined)
                    // Yes, add IE style
                    document.styleSheets[0].addRule(name, null, 0);
                else
                    // Yes, add Moz style.
                    document.styleSheets[0].insertRule(name + ' { }', 0);
        // return rule we just created.
        return $this.get(name);
    }
}(jQuery, WholeAuth));