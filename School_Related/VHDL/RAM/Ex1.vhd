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

component rams_no_change is
    port ( clk : in std_logic;
        we : in std_logic;
        en : in std_logic;
        addr : in std_logic_vector(3 downto 0);
        di : in std_logic_vector(15 downto 0);
        do : out std_logic_vector(15 downto 0));
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
    C2 : SSD port map(clk, DO(3 downto 0), DO(7 downto 4), DO(11 downto 8), DO(15 downto 12), cat, an);
    C3 : rams_no_change port map(clk, en2, sw(1), ADRESA, WD_ADD, DO);
                          
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