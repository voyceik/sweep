function [M Ps] = aa2mat(xseq, varargin)
% xseq - dna sequence
% varargin - sampling length. Eg. 1 monopeptide, 2 dipeptide (default)
%          - false, logical (default) ; true, prime geometric mean
%          - Previos primes values for each position in the sequence, for better
%            performance
% Ex. aa2mat(xseq, 2, true, Ps) 
l = 2;
WithPos = false;
Ps = [];
if ~isempty(varargin)
    l = varargin{1};
    if length(varargin)>1
       WithPos = varargin{2};
    end
    if length(varargin)==3
       Ps = varargin{3};
    end
end
s = 20^l;
L5 = dna2list(xseq,l*2+1);
%
%xy = round(([aa2num2(L5(:,1:2)) aa2num2(L5(:,4:5))]-1) * s / 400 + 0.5);
xy = [aa2num2(L5(:,1:l)) aa2num2(L5(:,l+2:l*2+1))];
%
inot = find(~prod(1-double(xy<=0),2));
xy(inot,:) = [];
%
inds = ij2inds(xy,s);
inds(inds>(s^2)) = [];
M = zeros(s,s,'double');
if WithPos
    if length(Ps)<length(inds)
        Ps = primon2(length(inds), Ps);
    end
    [vals inds] = unifysameinds(inds, Ps(1:length(inds)), @(x) prod(x.^(1/length(x))));
    M(inds) = vals;
else
    M(inds) = 1;
end
M(inds) = vals;
end
