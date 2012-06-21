class ClerkFacade
    def order menu
        list = List.new.check menu
        return nil if list.nil?
        time = Food.new.prepare list
        cook = Cook.new.cook menu,time
    end
end

class List 
    def check menu
        [:Carry,:Ramen,:Niku].index menu
    end
end

class Food
    @@limit = 5;
    def prepare list
        for time in 1..(list + @@limit) do
            time += time
        end
        return time
    end
end

class Cook
    def cook menu,time
        "#{menu} takes #{time} minutes"
    end
end

client = ClerkFacade.new.order(:Ramen)
p client.nil? ? 'Menu in not in List' : client 
