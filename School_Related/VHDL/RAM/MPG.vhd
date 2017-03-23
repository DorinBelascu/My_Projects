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
use IEEE.STD_LOGIC_ARITH.ALL;
use IEEE.STD_LOGIC_UNSIGNED.ALL;

-- Uncomment the following library declaration if using
-- arithmetic functions with Signed or Unsigned values
--use IEEE.NUMERIC_STD.ALL;

-- Uncomment the following library declaration if instantiating
-- any Xilinx leaf cells in this code.
--library UNISIM;
--use UNISIM.VComponents.all;

entity MPG is
    Port ( CLK : in STD_LOGIC;
           BTN : in STD_LOGIC;
           ENABLE : out STD_LOGIC);
end MPG;

architecture Behavioral of MPG is
signal count : STD_LOGIC_VECTOR(15 downto 0);
signal Q1 : STD_LOGIC;
signal Q2 : STD_LOGIC;
signal Q3 : STD_LOGIC;
signal REG_EN : STD_LOGIC;

begin                          
      
    process (CLK)
    begin
        if (rising_edge(CLK)) then
            count <= count + 1;      
        end if;
    end process; 
    
    REG_EN <= '1' when count(15 downto 0) = "1111111111111111" else '0'; 
    ENABLE <= not(Q3) and Q2;
    
    process (CLK) --Partea de Reg
    begin
        if (rising_edge(CLK) and REG_EN = '1') then
            Q3 <= Q2;        
            Q2 <= Q1;
            Q1 <= BTN;
        end if;
    end process;
        
 end Behavioral;
