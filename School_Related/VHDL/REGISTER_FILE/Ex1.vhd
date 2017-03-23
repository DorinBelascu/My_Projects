----------------------------------------------------------------------------------
-- Company: 
-- Engineer: 
-- 
-- Create Date: 03/04/2017 06:00:52 PM
-- Design Name: 
-- Module Name: test_env - Behavioral
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
use IEEE.STD_LOGIC_UNSIGNED.ALL;
USE iEEE.NUMERIC_STD.ALL;

-- Uncomment the following library declaration if using
-- arithmetic functions with Signed or Unsigned values
--use IEEE.NUMERIC_STD.ALL;

-- Uncomment the following library declaration if instantiating
-- any Xilinx leaf cells in this code.
--library UNISIM;
--use UNISIM.VComponents.all;

entity test_env is
    Port ( clk : in STD_LOGIC;
           btn : in STD_LOGIC_VECTOR(4 downto 0);
           led : out STD_LOGIC_VECTOR(15 downto 0);
           cat : out STD_LOGIC_VECTOR(6 downto 0);
           an : out STD_LOGIC_VECTOR(3 downto 0);
           sw : in STD_LOGIC_VECTOR(15 downto 0));
end test_env;

architecture Behavioral of test_env is

component MPG is
Port ( clk : in std_logic;
    btn: in std_logic;
    enable: out std_logic);
end component;

component SSD is
    Port ( clk : in STD_LOGIC;
           Digit0 : in STD_LOGIC_VECTOR(3 downto 0);
           Digit1 : in STD_LOGIC_VECTOR(3 downto 0);
           Digit2 : in STD_LOGIC_VECTOR(3 downto 0);
           Digit3 : in STD_LOGIC_VECTOR(3 downto 0);
           CAT : out STD_LOGIC_VECTOR(6 downto 0);
           AN : out STD_LOGIC_VECTOR(3 downto 0));
end component;

component REG is
    Port ( CLK : in STD_LOGIC;
       RA1 : in STD_LOGIC_VECTOR(3 downto 0);
       RA2 : in STD_LOGIC_VECTOR(3 downto 0);
       WA : in STD_LOGIC_VECTOR(3 downto 0);
       WD : in STD_LOGIC_VECTOR(15 downto 0);
       RD1 : out STD_LOGIC_VECTOR(15 downto 0);
       wen : in STD_LOGIC;
       RD2 : out STD_LOGIC_VECTOR(15 downto 0));
end component;

signal DO  : std_logic_vector(15 downto 0);
signal ADRESA : std_logic_vector(3 downto 0):=x"0";
signal WD_ADD : std_logic_vector(15 downto 0);

signal digits : STD_LOGIC_VECTOR(15 downto 0):=x"0000";
signal en : STD_LOGIC := '0';
signal en2 : STD_LOGIC := '0';

begin
    C1 : MPG port map(clk, btn(0), en);
    C4 : MPG port map(clk, btn(1), en2);
    C2 : SSD port map(clk, DO(15 downto 12), DO(11 downto 8), DO(7 downto 4), DO(3 downto 0), cat, an);
    C3 : REG port map(clk, ADRESA, ADRESA, ADRESA, WD_ADD, DO, en2, DO);
                          
    process (en, sw(0)) 
    begin

       if rising_edge(en) then
           if sw(0) = '1' then
                ADRESA <= "0000";
           else   
                ADRESA <= ADRESA + 1;
           end if;
      end if;
    end process;   
    
    process (en2)
    begin
        if rising_edge(en2) then
            WD_ADD(15 downto 0) <= DO(15 downto 0) + DO(15 downto 0);        
        end if;
    end process;
    

end Behavioral;

