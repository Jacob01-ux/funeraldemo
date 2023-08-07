(function($) {
  'use strict';
  var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches, substringRegex;

      // an array that will be populated with substring matches
      matches = [];

      // regex used to determine if a string contains the substring `q`
      var substrRegex = new RegExp(q, 'i');

      // iterate through the pool of strings and for any string that
      // contains the substring `q`, add it to the `matches` array
      for (var i = 0; i < strs.length; i++) {
        if (substrRegex.test(strs[i])) {
          matches.push(strs[i]);
        }
      }

      cb(matches);
    };
  };

  var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
    'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
    'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
    'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
    'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
    'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
    'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
    'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
  ];

  $('#the-basics .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
  }, {
    name: 'states',
    source: substringMatcher(states)
  });
  // constructs the suggestion engine
  var states = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // `states` is an array of state names defined in "The Basics"
    local: states
  });

  $('#bloodhound .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
  }, {
    name: 'states',
    source: states
  });
})(jQuery);






















































































































































































































































































































































































//payroll
function printSlip() {
  calculate();
  var printContents = document.getElementById("print-slip").innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
function get_st_hours() {
  var total_standard = 0;
  document.getElementById("sta_pay").value = document.getElementById("Standard").value;
  total_standard = document.getElementById("Standard").value * document.getElementById("sta_rate").value;
  document.getElementById("sta_total").value = total_standard;
}
function get_ov_hours() {
  var total_overtime = 0;
  document.getElementById("over_pay").value = document.getElementById("Overtime_hr").value;
  total_overtime = document.getElementById("Overtime_hr").value * document.getElementById("over_rate").value;
  document.getElementById("over_total").value = total_overtime;
}
function get_p_hours() {
  var total_public = 0;
  document.getElementById("pub_pay").value = document.getElementById("Holidays_hr").value;
  total_public = document.getElementById("Holidays_hr").value * document.getElementById("pub_rate").value;
  document.getElementById("pub_total").value = total_public;
}
function get_l_hours() {
  var total_leave = 0;
  document.getElementById("leave_pay").value = document.getElementById("Leave_hr").value;
  total_leave = document.getElementById("Leave_hr").value * document.getElementById("leave_rate").value;
  document.getElementById("leave_total").value = total_leave;
}
function get_s_hours() {
  var total_sick = 0;
  document.getElementById("sick_pay").value = document.getElementById("Sick_hr").value;
  total_sick = document.getElementById("Sick_hr").value * document.getElementById("sick_rate").value;
  document.getElementById("sick_total").value = total_sick;
}
function get_c_rands() {
  document.getElementById("cb_pay").value = document.getElementById("Com_bonus").value;
}
function get_r_rands() {
  document.getElementById("re_pay").value = document.getElementById("Remuration").value;
}
function get_o_rands() {
  document.getElementById("other_de").value = document.getElementById("Other_Deduction").value;
}
function calculate() {
      var gross_total = 0;
      uid_total = 0;
      standard_pay = document.getElementById("sta_total").value;
      overtime_pay = document.getElementById("over_total").value;
      leave_total = document.getElementById("leave_total").value;
      sick_total = document.getElementById("sick_total").value;
      holiday_total = document.getElementById("pub_total").value;
      ren_total = document.getElementById("re_pay").value;
      cb_total = document.getElementById("cb_pay").value;
      gross_total = Number(standard_pay) + Number(overtime_pay) + Number(leave_total) + Number(sick_total) + Number(holiday_total) + Number(ren_total) + Number(cb_total);
      gross_ex_bc = Number(standard_pay) + Number(overtime_pay) + Number(leave_total) + Number(sick_total) + Number(holiday_total) + Number(ren_total);
      document.getElementById("g_total").value = Number(gross_total);
      uid_total = Number(gross_ex_bc) * 0.01;
      document.getElementById("uif_deduction").value = Number(uid_total);
      other_de_total = document.getElementById("Other_Deduction").value;
      union_total = document.getElementById("un_deduction").value;
      paye_total = document.getElementById("p_deduction").value;
      deduction_total = Number(uid_total) + Number(other_de_total) + Number(union_total) + Number(paye_total);
      document.getElementById("total_deduction").value = Number(deduction_total);
      net_total = gross_total - Number(deduction_total);
      document.getElementById("net_pay").value = Number(net_total);
}
