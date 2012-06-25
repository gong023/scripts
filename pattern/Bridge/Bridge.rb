require './FuncClass.rb'
require './ImplClass.rb'
class Bridge
    def appointment
        person = {
            'name'   => ChildImpl.new.getName,
            'age'    => ChildFunc.new.getAge,
            'gender' => ChildFunc.new.getGender
        }
    end
end

Bridge.new.appointment.each {|key,value| puts "#{key} is #{value}"}
