----------------------------------------------------------------------------------
-- Company: 
-- Engineer: 
-- 
-- Create Date: 03/08/2017 05:12:27 PM
-- Design Name: 
-- Module Name: SSD - Behavioral
-- Project Name: 
-- Target Devices: 
-- Tool Versions: 
-- Description: 
-- 
-- Dependencies: 
-- 
-- Revision:
-- Revision 0.01 - File Created
-- Additional Comments:
-- 
----------------------------------------------------------------------------------


library IEEE;
use IEEE.STD_LOGIC_1164.ALL;
use IEEE.STD_LOGIC_ARITH.ALL;
use IEEE.STD_LOGIC_UNSIGNED.ALL;

-- Uncomment the following library declaration if using
-- arithmetic functions with Signed or Unsigned values
--use IEEE.NUMERIC_STD.ALL;

-- Uncomment the following library declaration if instantiating
-- any Xilinx leaf cells in this code.
--library UNISIM;
--use UNISIM.VComponents.all;

entity SSD is
    Port ( clk : in STD_LOGIC;
           Digit0 : in STD_LOGIC_VECTOR(3 downto 0);
           Digit1 : in STD_LOGIC_VECTOR(3 downto 0);
           Digit2 : in STD_LOGIC_VECTOR(3 downto 0);
           Digit3 : in STD_LOGIC_VECTOR(3 downto 0);
           CAT : out STD_LOGIC_VECTOR(6 downto 0);
           AN : out STD_LOGIC_VECTOR(3 downto 0));
end SSD;

architecture Behavioral of SSD is
signal outCounter:STD_LOGIC_VECTOR(15 downto 0);
signal outMUX:STD_LOGIC_VECTOR(3 downto 0);

begin

    process(clk)
        begin
        if (rising_edge(clk)) then
            outCounter <= outCounter + 1;
        end if;
    end process;
    
    process(outCounter)
        begin
        case outCounter(15 downto 14) is
        when "00" => AN <= "1110";
        when "01" => AN <= "1101";
        when "10" => AN <= "1011";
        when "11" => AN <= "0111";
        end case;
    end process;
    
    process(outCounter,Digit0,Digit1,Digit2,Digit3)
        begin
        case outCounter(15 downto 14) is
            when "00" => outMux <= Digit0;
            when "01" => outMux <= Digit1;
            when "10" => outMux <= Digit2;
            when "11" => outMux <= Digit3;
            end case;
        end process;
        
    process(outMux)
        begin
            case outMux is
                when "0001" => CAT <= "1111001";
                when "0010" => CAT <= "0100100";
                when "0011" => CAT <= "0110000";
                when "0100" => CAT <= "0011001";
                when "0101" => CAT <= "0010010";
                when "0110" => CAT <= "0000010";
                when "0111" => CAT <= "1111000";
                when "1000" => CAT <= "0000000";
                when "1001" => CAT <= "0010000";
                when "1010" => CAT <= "0001000";
                when "1011" => CAT <= "0000011";
                when "1100" => CAT <= "1000110";
                when "1101" => CAT <= "0100001";
                when "1110" => CAT <= "0000110";
                when "1111" => CAT <= "0001110";
                when others => CAT <= "1000000";
            end case;
        end process; 


end Behavioral;
