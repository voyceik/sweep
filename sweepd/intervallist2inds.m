function mret = intervallist2inds(list, varargin)
% Define indices em range para os intervalos io:if de list nX2
% varargin pode conter o tamanho maximo de fatias a serem processadas em
% Mega unidades
%Ex.: 
% >> x = 1:20;
% >> x(intervallist2inds([1,5;7,8;11,14])) = 0
% x -> 0   0   0   0   0   6   0   0   9  10   0   0   0   0  15  16  17  18  19  20
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
if isempty(varargin)
    mret = intervallist2inds0(list);
else
    mret = intervallist2inds0(list);
end
